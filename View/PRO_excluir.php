<?php
           
      

    if (isset( $_GET['id'])) {
        require_once '../Controller/PropostaController.php';

         $id=(int)$_GET['id'];
        $objControl = new PropostaController();
       $mensagem=  $objControl->excluirProposta($id);
         echo "<script language='javascript' type='text/javascript'>"
            . "alert('".$mensagem."');";

                echo "</script>";
                echo "<script language='javascript' type='text/javascript'>
window.location.href = 'PRO_index.php';
</script>";
           

    }else{
        
        header("Location:CAD_index.php");
        
    }

?>