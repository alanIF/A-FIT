<?php
    include './head.php';
    if(!$objControl->is_admin($_SESSION['tipo'])){
   echo "<script language='javascript' type='text/javascript'>
          window.location.href = 'home.php';
          </script>";                
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
                  <h6 class="m-0 font-weight-bold text-info">Treinos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Aluno</th>
                      <th>Data Inicial</th>
                      
                      <th>Data Final</th>
                      <th>Observação</th>
                  
                

                      <th>Ações</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                        require_once '../Controller/TreinoController.php';
                        $objControl = new TreinoController();
                        $dados=$objControl->listar();
                        $tamanho = count($dados);
                        if ($tamanho > 0) {
                            for ($i = 0; $i < $tamanho; $i++) {
                                 echo "<tr>";
                                            echo"<td>" . $dados[$i]['id'] . "</td>";

                                            echo"<td>" . $dados[$i]['aluno'] . "</td>";
                                           echo"<td>" . $dados[$i]['d_inicial'] . "</td>";

                                            
                                            echo"<td>" . $dados[$i]['d_final'] . "</td>";
                                            echo"<td>" . $dados[$i]['observacao'] . "</td>";
                                            
                                            
                                            echo"<td> <a href='TRE_eye.php?id=" . $dados[$i]['id'] . "'><i class='fas fa-eye' title='Editar Proposta'  aria-hidden='true'></i></a>   <a href='TRE_editar.php?id=" . $dados[$i]['id'] . "'><i class='fas fa-file' title='Editar Proposta'  aria-hidden='true'></i></a>
                                      <a onclick='return confirmar();' href='TRE_excluir.php?id=" . $dados[$i]['id'] . "'><i class='fa fa-trash' title='Excluir Proposta'  aria-hidden='true'></i></a></td></tr>";
                            }
                        
                        }else{
                            echo "<tr><td colspan='8'> Você não cadastrou  nenhum treino ainda, cadastre um treino!</td>";
                        }
                    ?>
                        <tfoot>
                                    <tr>
                                        <th colspan="8"> <a href=""  data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                                      
                                      
                                    </tr>
                                </tfoot>
                  </tbody>
                </table>
              </div>    
                </div>
              </div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Novo Treino</h5>
                <button type="button" class="close btn-danger" data-dismiss="modal">&times;</button>

      </div>
      <div class="modal-body">
        <p><?php include('TRE_cadastrar.php');?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

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

