<?php
session_start();
$_SESSION['hi']=1;

if(isset($_SESSION))
{
	if(isset($_SESSION['login']))
	{
		if($_SESSION['login'] == true)
		{
			$login = true;
			//$admin = $_SESSION['user_data']['role'];
			
			$auth = $_SESSION['user_data'];
			
		}
		else
			$login =false;
		
	}
	else
		$login = false;
}
else
	$login = false;

//var_dump($auth);
$conn =  mysqli_connect("localhost", "root", "", "zivima");
?>