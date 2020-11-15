<?php
    include './head.php';
     if(!$objControl->is_admin($_SESSION['tipo'])){
   echo "<script language='javascript' type='text/javascript'>
          window.location.href = 'home.php';
          </script>";                
        }
         if (isset($_GET['id'])){
        require_once '../Controller/ExercicioController.php';
        $objControl = new ExercicioController();
        $id = (int)$_GET['id'];   
        $exercicio= $objControl->getExercicio($id);
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
                  <h6 class="m-0 font-weight-bold text-info">Exercício >> Atualizar</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                                              
                        <div class="form-group">
                    <input type="text" name="nome" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nome" value="<?php echo $exercicio[0]['nome'];?>" required="">
                    </div>
                          <div class="form-group">
                               <textarea class="ckeditor" name="demostracao" placeholder="" required=""><?php echo $exercicio[0]['demostracao'];?> </textarea>
                    </div>
                           
                         <div class="form-group">
                    <input type="text" name="grupo" class="form-control form-control-user" id="exampleInputEmail" value="<?php echo $exercicio[0]['grupo'];?>" placeholder="Grupo Muscular" required="">
                    </div>
                           <div class="form-group">
                    <input type="text" name="intervalo" class="form-control form-control-user" id="exampleInputEmail" value="<?php echo $exercicio[0]['intervalo'];?>" placeholder="Intervalo" required="">
                    </div>
                           <div class="form-group">
                    <input type="text" name="serie" class="form-control form-control-user" id="exampleInputEmail" value="<?php echo $exercicio[0]['serie'];?>"  placeholder="Série" required="">
                    </div> 
                      <div class="form-group">
                    <input type="text" name="repeticao" class="form-control form-control-user" id="exampleInputEmail" placeholder="N° de Repetições" value="<?php echo $exercicio[0]['repeticao'];?>" required="">
                    </div>      
          
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Atualizar</button>
                  <a href="EXE_index.php" class="btn btn-warning btn-user btn-block">Voltar</a>
                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                          require_once '../Controller/ExercicioController.php';
                        $objControl = new ExercicioController();
                        $mensagem = $objControl->atualizarExercicio($_POST["nome"], $_POST["demostracao"], $_POST["grupo"],$_POST['intervalo'],$_POST['serie'], $_POST['repeticao'],$id);
                                echo "<script language='javascript' type='text/javascript'>"
                                  . "alert('".$mensagem."');";
                                echo "</script>";
                                                                        echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='EXE_editar.php?id=".$id."'>";

                      
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
