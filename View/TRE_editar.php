<?php
    include './head.php';
     if(!$objControl->is_admin($_SESSION['tipo'])){
   echo "<script language='javascript' type='text/javascript'>
          window.location.href = 'home.php';
          </script>";                
        }
         if (isset($_GET['id'])){
        require_once '../Controller/TreinoController.php';
        $objControl = new TreinoController();
        $id = (int)$_GET['id'];   
        $exercicio= $objControl->getTreino($id);
        if ( $exercicio==null){
                              echo "<script language= 'JavaScript'>
                                        location.href='./EXE_index.php'
                                </script>";
        }
        
    }
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          </div>

          <!-- Content Row -->
          <div class="row">
                 <!-- Content Column -->
            <div class="col-lg-12 mb-6">
              
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Treino >> Atualizar</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                                              
                      <div class="form-group">
                          <input type="date" name="d_inicial"  value="<?php echo $exercicio[0]['d_inicial'];?>" class="form-control form-control-user" id="exampleInputEmail" placeholder="Data Inicial" required="">
                    </div>
                   <div class="form-group">
                            <input type="date" name="d_final" class="form-control form-control-user" value="<?php echo $exercicio[0]['d_final'];?>" id="exampleInputEmail" placeholder="Data Final" required="">
                    </div>
                           
                        
                           <div class="form-group">
                    <input type="text" name="observacao" class="form-control form-control-user" value="<?php echo $exercicio[0]['observacao'];?>" id="exampleInputEmail" placeholder="Observação" required="">
                    </div>
                            
          
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Atualizar</button>
                  <a href="TRE_index.php" class="btn btn-warning btn-user btn-block">Voltar</a>
                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                          require_once '../Controller/TreinoController.php';
                        $objControl = new TreinoController();
                        $mensagem = $objControl->atualizarTreino($_POST["d_inicial"], $_POST["d_final"], $_POST["observacao"],$id);
                                echo "<script language='javascript' type='text/javascript'>"
                                  . "alert('".$mensagem."');";
                                echo "</script>";
                                                                        echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='TRE_editar.php?id=".$id."'>";

                      
                    }
                    ?>   
                </div>
              </div>

            

            </div>
           

          

         

          </div>

          <!-- Content Row -->


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    <?php
   include './foot.php';
?>
