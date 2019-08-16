<?php 

class Login extends Controller{


function loginAuth($user,$password){
	$url='UsersLogin/'.$user.'/'.$password;
	$result=$this->post($url);
	
	if(count($result)>0){

		$_SESSION['User']=$result;
		return true;
	}else{
		$_SESSION['mensaje']['error']='Datos de Inicio Incorrectos';
		return false;
	}
	exit(0);
}

function CheckLogin(){
	if(!isset($_SESSION['User'])){
    $_SESSION['mensaje']['error']='Debes Loguearte';
    header('location:index.php');
	}
}




}

?>