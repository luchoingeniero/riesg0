<?php 
class Notificaciones{

	function Mensaje(){

		 if(isset($_SESSION['mensaje'])&&!empty($_SESSION['mensaje'])){

                if(isset($_SESSION['mensaje']['error'])){?>

                    <div class="alert alert-warning">
			            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
			            <strong>Opps!</strong> <?php echo $_SESSION['mensaje']['error']; ?>
			         </div> 

               <?php }
                 else if(isset($_SESSION['mensaje']['ok'])){
                    ?>

                    <div class="alert alert-success">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            <strong>Felicitaciones!</strong> <?php echo $_SESSION['mensaje']['ok'] ?>
          </div> 

                 <?php }   
                
                unset($_SESSION['mensaje']);
            }



	}
}
?>