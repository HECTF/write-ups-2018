<?php session_start();?>
<head>
<meta http-equiv=Content-Type content="text/html;charset=utf-8">
<title>后台管理系统</title>
</head>
<body>
<?php 
if(isset($_SESSION['randCode'])){
	if(($_GET['username'] == "") or ($_GET['password'] == "") or ($_GET['randcode'] == "")){
		$_SESSION['randCode']=substr(md5(rand(0,99999)),0,5);
		echo "<center><h3><font>注意：用户名、密码、验证码均不能为空。</font></h3></center>";
	}else{
		if($_GET['username'] != "admin"){
			$_SESSION['randCode']=substr(md5(rand(0,99999)),0,5);
			die("<h3>真的只有admin一个用户</h3>");
		}elseif (substr(md5($_GET['randcode']),0,5) != substr(md5($_SESSION['randCode']),0,5)) {
			$_SESSION['randCode']=substr(md5(rand(0,99999)),0,5);
			die("<h3>验证码错误</h3>");
		}elseif ($_GET['password'] != "582"){
			$_SESSION['randCode']=substr(md5(rand(0,99999)),0,5);
			die("<h3>密码错误</h3>");
		}else{
			die("<center><h3>HEBTUCTF{Bru7e_f0rC3_233}</h3></center>");
		}
	}	
}else{
	$_SESSION['randCode']=substr(md5(rand(0,99999)),0,5);
}
?>



<center>

	<br>

	<br>

	<br>

	<form action="index.php" method="get">

		用户名：<input name="username" type="text" value="admin"><br><br>

		密&nbsp;&nbsp;码：<input name="password" type="password"><br><br>

		验证码：<input name="randcode" type="text"> <?php echo "<br>"."md5(验证码)[0:5] ===".$_SESSION['randCode']."<br><br>" ?>

		<input type="submit" value="确定"><br><br><br>

	</form>	

</center>

</body>



<!-- 听说密码是3位纯数字 -->


