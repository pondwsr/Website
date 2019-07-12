<?php
	session_start();
	$mysqli = mysqli_connect("localhost","root","03112541");
	mysqli_select_db($mysqli,"test");
	$strSQL = "SELECT * FROM admin WHERE User = '".mysqli_real_escape_string($mysqli,$_POST['txtUsername'])."' 
	and Password = '".mysqli_real_escape_string($mysqli,$_POST['txtPassword'])."'";
	$objQuery = mysqli_query($mysqli,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
	if(!$objResult)
	{
			echo "<script> alert('Username and Password Incorrect!');</script>"."''";
			
			echo header("location:index.php");
	}
	else
	{
			$_SESSION["User"] = $objResult["User"];
			

			session_write_close();
			
			if($objResult["User"] == "Pondwsr")
			{
				header("location:index.php");
			}
			else
			{
				header("location:manage.php");
			}
	}
	mysqli_close($mysqli);
?>