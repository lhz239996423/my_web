<?php
header("Content-Type:text/html;charset=utf-8");      //设置头部信息

session_start();//登录系统开启一个session内容
$username=$_REQUEST["user"];//获取html中的用户名（通过post请求）
$password=$_REQUEST["pwd"];//获取html中的密码（通过post请求）
$_SESSION["user"]=$username;

$mysqli=new mysqli("localhost","root","root","notepad");//连接mysql 数据库，账户名root ，密码root
if (mysqli_connect_errno()) {
    die('数据库连接失败'.mysqli_connect_error());
}
$dbuser=null;
$dbpwd=null;
$result=$mysqli->query("select * from user where user ='$username';");//查出对应用户名的信息
while (list($user,$pwd)=$result->fetch_row()) {//while循环将$result中的结果找出来
    $dbuser=$user;
    $dbpwd=$pwd;
} 

if (is_null($dbuser)) { // 用户名在数据库中不存在时跳回login.php界面
    ?>
<script type="text/javascript"> 
 alert("用户名不存在"); 
 window.location.href="login.html"; 
 </script>
<?php
} else {
    if ($dbpwd != md5($password)) { // 当对应密码不对时跳回index.html界面
        ?>
<script type="text/javascript"> 
 alert("密码错误"); 
 window.location.href="login.html"; 
 </script>
<?php
    } else {
        $_SESSION["code"] = mt_rand(0, 100000); // 给session附一个随机值，防止用户直接通过调用界面访问
                ?>
                <script type="text/javascript"> 
                 //alert("登录成功"); 
                 window.location.href="notepad.php"; 
    			</script> 
				<?php
        }
        
    }
$mysqli->close(); // 关闭数据库连接，如不关闭，下次连接时会出错

?> 