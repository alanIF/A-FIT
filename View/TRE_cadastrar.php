
      

            <div class="col-lg-12 mb-6">
              
              <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-info">Treino >> Cadastrar</h6>
                </div>
                <div class="card-body">
                     <form class="user" action="" method="post" enctype="multipart/form-data">
                       <div class="form-group">
                <select class="form-control select2" name="aluno" id="sel1">
                    <?php 
                     require_once '../Controller/UsuarioController.php';
                        $objControl2 = new UsuarioController();
                        $dados=$objControl2->listar();
                        $tamanho = count($dados);
                        if ($tamanho > 0) {
                            for ($i = 0; $i < $tamanho; $i++) {
                                 

                                            if($dados[$i]['tipo']==2){
                                echo "<option value='".$dados[$i]['id']."'>".$dados[$i]['nome']."</option>";
                                            }
                                          
                            }
                        
                        }
                    
                    
                    
                    ?>
                </select>
              </div>                       
                                   <div class="form-group">
                            <input type="date" name="d_inicial" class="form-control form-control-user" id="exampleInputEmail" placeholder="Data Inicial" required="">
                    </div>
                   <div class="form-group">
                            <input type="date" name="d_final" class="form-control form-control-user" id="exampleInputEmail" placeholder="Data Final" required="">
                    </div>
                           
                        
                           <div class="form-group">
                    <input type="text" name="observacao" class="form-control form-control-user" id="exampleInputEmail" placeholder="Observação" required="">
                    </div>
                            
          
                  <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Cadastrar</button>
                  <a href="TRE_index.php" class="btn btn-warning btn-user btn-block">Voltar</a>
                
              </form>
                 <?php
                    
                    if (isset($_POST["botao"])) {
                          require_once '../Controller/TreinoController.php';
                        $objControl = new TreinoController();
                        $mensagem = $objControl->cadastrarTreino($_POST["aluno"], $_POST["d_inicial"], $_POST["d_final"],$_POST['observacao']);
                                echo "<script language='javascript' type='text/javascript'>"
                                  . "alert('".$mensagem."');";
                                echo "</script>";
                                                                      echo "<meta HTTP-EQUIV='refresh' CONTENT='1;URL='TRE_index.php?id=".$id."'>";

                      
                    }
                    ?>   
                </div>
              </div>

            

            </div>
           

          

         
<script>
    $(function () {
        //Initialize Select2 Elements
        $(".select2").select2();

    });
</script>