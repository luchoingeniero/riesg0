<?php @session_start();
require_once 'php/clases/Controller.php';
$directorio = opendir("php/clases/app");
while($elemento = readdir($directorio)){
  if($elemento != '.' && $elemento != '..'){
  require_once 'php/clases/app/'.$elemento;
}
}



$Login=new Login;	

 if(isset($_GET['page'])) {
		$sPage = $_GET['page'];
	} else {
		$sPage = 'dashboard';
	}

  if($sPage=="logout"){
    @session_destroy();
    @session_start();
    $_SESSION['mensaje']['ok']='Hasta Pronto';
    header('location:index.php');
    exit(0);
 }

if($sPage=='login'){
  if(isset($_POST['nick'])&&isset($_POST['clave'])){
    $url=($Login->loginAuth($_POST['nick'],$_POST['clave']))?"home.php":"index.php";
    header("location:".$url);
    exit(0);  
  }
}

$Login->CheckLogin();

$directorio = opendir("php/eventos");
while($elemento = readdir($directorio)){
  if($elemento != '.' && $elemento != '..'){
  include 'php/eventos/'.$elemento;
}
}

/*if ($sPage=="Alertas"){

        $includePage='php/pages/page-Alertas.php';
        $script='<script>Alerta.List();</script>';
    }*/
  /*if ($sPage=="AlertasAsignadas"){

        $includePage='php/pages/page-AlertasAsignadas.php';
        $script='<script>Alerta.List2();</script>';
    }*/

   /* if ($sPage=="MisAlertasAsignadas"){

        $includePage='php/pages/page-MisAlertasAsignadas.php';
        $user_id=$_SESSION['User']->id;
        $script='<script>Alerta.List3("'.$user_id.'");</script>';
    }*/