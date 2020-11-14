<?php
    include './head.php';
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
                  <h6 class="m-0 font-weight-bold text-info">Propostas > Cadastrar</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                                                 <div class="form-group">
                                                      <select class="form-control" name="candidato" required="">
                                                        <?php 
                                                            require_once '../Controller/CandidatoController.php';
                                                            $objControl2 = new CandidatoController();
                                                            $dados= $objControl2->listar();
                                                            $tamanho = count($dados);
                                                        if ($tamanho > 0) {
                                                            for ($i = 0; $i < $tamanho; $i++) {
                                                                echo "<option value='". $dados[$i]['id'] ."'>" . $dados[$i]['nome'] ." </option> ";
                                                            }
                                                        }
                                                        ?>
                                                                
                                                        </select>
                                                 </div>
                        <div class="form-group">
                    <input type="text" name="titulo" class="form-control form-control-user" id="exampleInputEmail" placeholder="Titulo" required="">
                    </div>
                       
                           <div class="form-group">
                               <textarea class="ckeditor" name="descricao" placeholder="" required=""> Descrição </textarea>
                    </div>
                           
          
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Cadastrar</button>
                  <a href="PRO_index.php" class="btn btn-warning btn-user btn-block">Voltar</a>
                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                          require_once '../Controller/PropostaController.php';
                        $objControl = new PropostaController();
                        $mensagem = $objControl->cadastrarProposta($_POST["candidato"], $_POST["titulo"], $_POST["descricao"]);
                                echo "<script language='javascript' type='text/javascript'>"
                                  . "alert('".$mensagem."');";
                                echo "</script>";
                            
                      
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
