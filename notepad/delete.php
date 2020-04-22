<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新冠肺炎（COVID-19）web</title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <style type="text/css">
        html,body{
            height:100%; width:100%; overflow:hidden; margin:0;padding:0;}
    </style>
</head>

<body>
<?php
session_start();
if (isset ( $_SESSION ["code"] )) {//判断code存不存在，如果不存在，说明异常登录
    
}else{
    ?>
    <script type="text/javascript"> 
     window.location.href="login.html"; 
	</script>
<?php
    } 
    $mysqli=new mysqli("localhost","root","root","notepad");//连接mysql 数据库，账户名root ，密码root
    if (mysqli_connect_errno()) {
        die('数据库连接失败'.mysqli_connect_error());
    }
    mysqli_set_charset($mysqli,"utf8");
    $count=0;
    $dbmau_id=null;
    $dbmau_user=null;
    $dbmau_note=null;
    $dbmau_time=null;

    $username=$_SESSION["user"];
    $result=$mysqli->query("select * from note where user ='$username';");//查出对应用户名的信息
    
    ?>
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
                            <li><a href="register.php">注册</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!--/.navbar-collapse -->
        </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->

    <body>
        <div  class="bg-note">
            <section class="bg-top tab-center">
            <div class="container">
                <div class="row">
                    <div class="table-no-boder table-responsive col-md-6 col-md-offset-3">
                    <table align="center" style="margin-top:50px; width:100%; margin-bottom:20px;">
                    <tr align="center">
                        <td><button type="button" class="btn btn-primary" onclick="window.location.href='notepad.php'">浏览</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location.href='find.php'">查找</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location.href='add.php'">添加</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location.href='update.php'">修改</button></td>
                    </tr>
                    </table>
                    </div>
                </div>
            
                <div class="row tab-text">
                    <h2>备忘录</h2>
                    <div class="table-responsive">
                    <table class="table table-delete">
                    <tr>
                        <td>序号</td>
                        <td>备忘信息</td>
                        <td>日期</td>
                        <td>操作</td>
                    </tr>
                    <?php 
                    //初始化计数器
                    $count=0;
                    while (list($id,$user,$note,$time)=$result->fetch_row())
                    {//while循环将$result中的结果找出来
                        $dbid=$id;
                        $dbnote=$note;
                        $dbtime=$time;
                        $count++;
                    
                    ?>
                    <tr>
                        <form  method="post" action="" name="ss" enctype="multipart/form-data">
                        <td><span><?php echo $count;?></span></td>
                        <td><span><?php echo $dbnote;?></span></td>
                        <td><span><?php echo $dbtime;?></span></td>
                        <td><button type="submit" class="btn btn-success" name="note-add" value="<?php echo $dbid ?>">删除</button></td>
                        </form>
                        
                    </tr>
                    <?php 
                    
                        }
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $db_id=$_REQUEST["note-add"];

                            //根据获取的ID删除
                            $det=$mysqli->query("delete from note where id ='$db_id';");
                            ?>
                            <script type="text/javascript"> 
                                //刷新页面
                                window.location.href="delete.php"; 
                            </script>
                            <?php
                            }
                            $mysqli->close();//避免下次连接出错
                    ?>
                </table>
                    </div>
            </div>
        </section>
            <div class="bg-footer">
            <hr>
            <footer>
                <p>Copyright &copy; 2020 Rain Lin. All Right Reserved <span class="foot-sp">Email：239996423@qq.com</span></p>
            </footer>
            </div>
        </div>    
    </div>
        

        <!-- /container -->


        <!-- Bootstrap core JavaScript
      ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../bootstrap/js/jquery-3.4.1.js"></script>
        <script src="../bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>