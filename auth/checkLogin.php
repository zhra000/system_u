<?php require $_SERVER['DOCUMENT_ROOT']."/system_u/vendor/autoload.php";?>
<?php
use App\Model\User;

$user_obj = new User;

$result = $user_obj->checkUser($_POST);

if($result){
	header("location: /system_u/image/home.php");
} else {
	header("location: /system_u/index.php?msg=error");
}
?>