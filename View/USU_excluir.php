<?php
           
      if(!$objControl->is_admin($_SESSION['tipo'])){
   echo "<script language='javascript' type='text/javascript'>
          window.location.href = 'home.php';
          </script>";                
        }

    if (isset( $_GET['id'])) {
        require_once '../Controller/UsuarioController.php';

         $id=(int)$_GET['id'];
        $objControl = new UsuarioController();
       $mensagem=  $objControl->excluirUsuario($id);
         echo "<script language='javascript' type='text/javascript'>"
            . "alert('".$mensagem."');";

                echo "</script>";
                echo "<script language='javascript' type='text/javascript'>
window.location.href = 'USU_index.php';
</script>";
           

    }else{
        
        header("Location:USU_index.php");
        
    }

?>