<?php
           
      

    if (isset( $_GET['id'])) {
        require_once '../Controller/ExercicioController.php';

         $id=(int)$_GET['id'];
        $objControl = new ExercicioController();
       $mensagem=  $objControl->excluirExercicio($id);
         echo "<script language='javascript' type='text/javascript'>"
            . "alert('".$mensagem."');";

                echo "</script>";
                echo "<script language='javascript' type='text/javascript'>
window.location.href = 'EXE_index.php';
</script>";
           

    }else{
        
        header("Location:EXE_index.php");
        
    }

?>