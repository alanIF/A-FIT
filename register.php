<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sig Candidatos- Cadastrar</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Criar Conta</h1>
              </div>
              <form class="user"  method="post"   action=""  enctype="multipart/form-data">
                  <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="exampleNome" name="nome" placeholder="Nome" required="">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email"  placeholder="Email Address" required="">
                </div>
                 <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="password" name="senha" class="form-control form-control-user" id="exampleInputPassword" placeholder="Senha" required="">
                  </div>
                  <div class="col-sm-6">
                      <input type="password" name="senhaR" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repetir sua Senha" required="">
                  </div>
                </div>
                 <button type="submit" class="btn btn-primary btn-user btn-block" name="botao">Cadastrar</button>
                
              </form>
               
              <hr>
                <?php
                    require_once 'Model/connect.php';   

                    require_once './Controller/UsuarioController.php';
                    if (isset($_POST["botao"])) {
                        $objControl = new UsuarioController();
                        // tipo depois alterar quando passar para uma versao geral
                        

                        if( strcmp($_POST["senha"],$_POST['senhaR'])==0){
                            $objControl->Cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"]);
                        }else{
                            Alert("ERROR!", "Senhas não coicidentes!","danger");
                        }
                    }
                    ?>  
              <div class="text-center">
                  <a  class="btn btn-primary btn-user btn-block"href="index.php">Já tem uma conta? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
