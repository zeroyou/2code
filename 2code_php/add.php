<?php

header("Access-Control-Allow-Origin: *"); 
$u = isset($_GET["u"]) ? $_GET["u"] : '';
$c = isset($_GET["c"]) ? $_GET["c"]: '';
$a = isset($_GET["a"]) ? $_GET["a"] : '';
$n = isset($_GET["n"]) ? $_GET["n"]: '';

 
// 连主库
$conn = mysqli_connect('w.rdc.sae.sina.com.cn'.':'.'3306','kzl3w535lm','1313mzj34mi1x05z5k3imj1k2j13m2w2hykl1ziz','app_jxjweb');

// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
} 
 

$sql="INSERT INTO `app_jxjweb`.`2code_code` (`id`, `user`, `num`, `content`, `address`, `address_id`, `name`) VALUES (NULL, '".$u."', '1', '".$c."', '".$a."', '', '".$n."')";

$result = $conn->query($sql);

class Verify {
    public $code  = '00';
}
$verify = new Verify();
if ($result){
    $verify->code = 1;
}else{
$verify->code = 0;
}
echo json_encode($verify);
mysqli_close($conn);
$conn->close();
?>
