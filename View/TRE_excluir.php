<?php
           
      

    if (isset( $_GET['id'])) {
        require_once '../Controller/TreinoController.php';

         $id=(int)$_GET['id'];
        $objControl = new TreinoController();
       $mensagem=  $objControl->excluirTreino($id);
         echo "<script language='javascript' type='text/javascript'>"
            . "alert('".$mensagem."');";

                echo "</script>";
                echo "<script language='javascript' type='text/javascript'>
window.location.href = 'TRE_index.php';
</script>";
           

    }else{
        
        header("Location:TRE_index.php");
        
    }

?>