<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新冠肺炎（COVID-19）web</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.html">新冠肺炎（COVID-19）web</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="../index.html">首页</a></li>
                    <li><a href="../views/preventCovid.html">预防新冠肺炎</a></li>
                    <li><a href="../views/detailsCovid.htm">新冠肺炎详情</a></li>
                    <li><a href="../views/about.html">关于我们</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">备忘录<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="notepad.php">备忘录</a></li>
                            <li><a href="login.html">登录</a></li>
                            <li><a href="#">注册</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->

    <body>
        <section class="bg-ab-one">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-3 col-xs-1 "></div>
                    <div class="col-md-4 col-sm-6 col-xs-10 ">
                        <form class="form-horizontal" method="post" action="" name="register" enctype="multipart/form-data">
                            <input type="hidden" name="actionName" value="register">
                            <span class="heading"><font color="#4F4F4F">用户注册</font> </span>
                            <div class="form-group">
                                <input type="text" name="user" class="form-control" id="inputEmail" placeholder="用户名">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group help">
                                <input type="password" name="pwd" class="form-control" id="pwd" placeholder="密码">
                                <i class="fa fa-lock"></i>
                                <a href="#" class="fa fa-question-circle"></a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default" id="asubmit">注册</button>
                            </div>
                        </form>
                        <?php
                        session_start();//登录系统开启一个session内容
                        if ($_SERVER["REQUEST_METHOD"] == "POST"&&$_REQUEST["user"]!=null&&$_REQUEST["pwd"]!=null) {//如果提交成功，开始判断是否写入数据库
                            //连接数据库
                            $host='localhost';
                            $username='root';
                            $password='root';
                            $dbname='notepad';
                            $user=$_REQUEST["user"];

                            $mysqli=new mysqli($host,$username,$password,$dbname);
                            mysqli_set_charset($mysqli,"utf8");

                            $result=$mysqli->query("select * from user where user ='$user';");//查出对应用户名的信息
                            $row=mysqli_fetch_row($result);
                            if($row){
                                ?>
                                <script type="text/javascript"> 
                                alert("用户名已存在"); 
                                // window.location.href="login.php"; 
                                </script>
                                <?php
                            }
                            else{
                                //插入用户名密码
                                $query_u="insert into user(user,pwd) values(?,?)";
                                $u_s=$mysqli->prepare($query_u);
                                $u_s->bind_param('ss',$user,$pwd);
                                //一条记录
                                $user = $_POST["user"];
                                $pwd = md5($_POST["pwd"]);//加密密码
                                $u_s->execute();
                                $u_s->close();
                                ?>
                                <script type="text/javascript"> 
                                alert("注册成功"); 
                                window.location.href="login.html"; 
                                </script>
                                <?php
                            }
                        }?>

                    </div>

                </div>
            </div>
        </section>
        <section class="bg-ab-one">
            <footer>
                <p>Copyright &copy; 2020 Rain Lin. All Right Reserved <span class="foot-sp">Email：239996423@qq.com</span></p>
            </footer>
        </section>

        <!-- /container -->


        <!-- Bootstrap core JavaScript
      ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootstrap/js/jquery-3.4.1.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>

</html>