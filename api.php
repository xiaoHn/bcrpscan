<html>
<head>
<meta charset=" utf-8">
<title>Myvulscan platform</title>
<meta name="author" content="拂晓" />
<meta name="title" content="Myvulscan platform">
</head>
<body>
<?php
error_reporting(0);
include('../config/conn.php'); 
include('../config/safe.php'); 
//接受前端传递的数据
$jsoncode = $_POST['jsoncode'];
//echo $jsoncode.'<br/>';
//json解码
$obj = json_decode($jsoncode);
//print_r($obj);
//json解析
$apiid = sqlsafe_replace($obj->{'apiid'});
//echo $apiid;
$reqhost = ($obj->{'reqhost'});
$reqhost_test = sqlsafe_replace($reqhost->{'reqhost_test'});
$reqhost_yf = sqlsafe_replace($reqhost->{'reqhost_yf'});
$reqhost_online = sqlsafe_replace($reqhost->{'reqhost_online'});
$gitpath = sqlsafe_replace($reqhost->{'gitpath'});
$reqtype = $obj->{'reqtype'};
$reqprotocol = $obj->{'reqprotocol'};
$requri = base64_encode($obj->{'requri'});
$reqheader = base64_encode($obj->{'reqheader'});
$reqbody = base64_encode($obj->{'reqbody'});
//定义其他请求参数
$addid = '';
$addtime = date('Y-m-d H:i:s', time());
$data=array("apiid"=>(isset($apiid) and (strlen($apiid)>14) and (strlen($apiid)<33))? trim($apiid) :'',"reqhost_test"=>isset($reqhost_test) ? trim($reqhost_test) :'','reqtype'=>isset($reqtype)?trim($reqtype):'','reqprotocol'=>isset($reqprotocol)?trim($reqprotocol):'',"reqheader"=>isset($reqheader)?trim($reqheader):'');
$judgement=(array_keys($data,'')); 

if(count($judgement)>0) {
	 $success='error';
	 $indexpage = 'not exists or other error!';
	 $json_succ = array('status' =>$success,$judgement[0]=>($indexpage));
	 echo json_encode($json_succ);

}
else{
	// 执行insert语句
	$reqsql1 = "insert into Requestdata values('$addid','$apiid','$reqhost_test','$reqhost_yf','$reqhost_online','$reqtype','$reqprotocol','$requri','$reqheader','$reqbody','$gitpath','$addtime')";

	$execstatus =  mysqli_query($con,$reqsql1);
	if($execstatus ==1){
		 $success='sucess';
		 $indexpage = 'back to the index.php!';
		$json_succ = array('status' =>$success,'next'=>($indexpage));
		echo json_encode($json_succ);

		//header("refresh:3;url=../index.php");
	}
	else{
		
		$success='error';
		$indexpage = 'not exists or other error!!';
		$json_succ = array('status' =>$success,'shit'=>($indexpage));
		echo json_encode($json_succ);
	}
mysqli_close($con);
}

?>
</body>
</html>
