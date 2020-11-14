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
                  <h6 class="m-0 font-weight-bold text-info">Propostas dos Candidatos</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Candidato</th>
                      <th>Título</th>
                      <th>Descrição</th>
                 

                      <th>Ações</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php 
                        require_once '../Controller/PropostaController.php';
                        $objControl = new PropostaController();
                        $dados=$objControl->listar();
                        $tamanho = count($dados);
                        if ($tamanho > 0) {
                            for ($i = 0; $i < $tamanho; $i++) {
                                 echo "<tr>";
                                            echo"<td>" . $dados[$i]['id'] . "</td>";

                                            echo"<td>" . $dados[$i]['candidato'] . "</td>";
                                            echo"<td>" . $dados[$i]['titulo'] . "</td>";
                                            echo"<td>" . $dados[$i]['descricao'] . "</td>";
                                            
                                            echo"<td>  <a href='PRO_editar.php?id=" . $dados[$i]['id'] . "'><i class='fas fa-file' title='Editar Proposta'  aria-hidden='true'></i></a>
                                      <a onclick='return confirmar();' href='PRO_excluir.php?id=" . $dados[$i]['id'] . "'><i class='fa fa-trash' title='Excluir Proposta'  aria-hidden='true'></i></a></td></tr>";
                            }
                        
                        }else{
                            echo "<tr><td colspan='5'> Você não cadastrou  nenhuma proposta ainda, cadastre uma proposta!</td>";
                        }
                    ?>
                        <tfoot>
                                    <tr>
                                        <th colspan="5"> <a href="PRO_cadastrar.php"><i class="fa fa-plus-square" aria-hidden="true"></i></a></th>
                                      
                                      
                                    </tr>
                                </tfoot>
                  </tbody>
                </table>
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

