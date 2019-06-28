<?php
//设置时区
date_default_timezone_set('Asia/Shanghai'); 
//设置编码
header("Content-type: text/html; charset=utf-8");
//配置数据库
$dbhost = '127.0.0.1';
$dbname = 'root';
$dbpass = 'Admin2015';
$databasename = 'vulscan';
$con = mysqli_connect($dbhost,$dbname,$dbpass,$databasename);
if (mysqli_connect_errno($con)) 
{ 
    echo "连接 MySQL 失败: " . mysqli_connect_error(); 
} 

