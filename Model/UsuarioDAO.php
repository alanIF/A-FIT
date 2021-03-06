<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioDAO
 *
 * @author PICHAU
 */
class UsuarioDAO {

  function listar(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select * from usuario");
        $i = 0;
        $usuarios= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $usuarios[$i]['id'] = $row['id'];
                   $usuarios[$i]['nome'] = $row['nome'];
                   $usuarios[$i]['email'] = $row['email'];
                   $usuarios[$i]['tipo'] = $row['tipo'];
                   $usuarios[$i]['senha'] = $row['senha'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $usuarios;
}
function getUsuario($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select * from usuario where id='".$id."'");
        $i = 0;
        $usuarios= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $usuarios[$i]['id'] = $row['id'];
                   $usuarios[$i]['nome'] = $row['nome'];
                   $usuarios[$i]['email'] = $row['email'];
                   $usuarios[$i]['tipo'] = $row['tipo'];
                   $usuarios[$i]['senha'] = $row['senha'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $usuarios;
}
function logar($email, $senha) {
    require_once 'Model/connect.php';   

    $conn = F_conect();
    session_start();
    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email='" . $email . "' AND senha='" . $senha . "'");
    if (mysqli_num_rows($result) == 1) {
        // teste - certo

        while ($row = $result->fetch_assoc()) {
            $id = $row["id"];
            $nome=$row['nome'];
            $tipo=$row['tipo'];
        }
        //fim teste
        $_SESSION['nome']=$nome;
        $_SESSION['usuario'] = $email;
        $_SESSION['tipo']=$tipo;
        $_SESSION['id'] = $id;
        $_SESSION['ativo'] = true;
       
        header('Location:./View/home.php');

        
    } else if (mysqli_num_rows($result) != 1) {
        $_SESSION['usuario'] = "";
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    } else {
        $_SESSION['usuario'] = "";
        $_SESSION['ativo'] = false;
        Alert("Ops!", "Email e senha não correspondem", "danger");
    }
}

function sair() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
   

          $_SESSION = array();
          if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
            
            session_destroy();
            header('Location: ../index.php');
    }
    Alert("Ops!", "Erro ao sair do sistema, procure o suporte!", "danger");
}

function testLogado() {
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    if ($_SESSION['usuario'] == false) {
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: ../index.php');
    }
}
function is_admin($tipo) {
    if(strcmp ( "1" , $tipo )==0) {
        return true; 
    }
    return false;
}

function cadastrar($nome, $email, $senha,$tipo) {
   require_once 'connect.php';

    $conn = F_conect();
    $sql = "INSERT INTO usuario(nome, email, senha, tipo)
            VALUES('" . $nome . "','" . $email . "','" . $senha . "' , '".$tipo."')";
    if ($conn->query($sql) == TRUE) {
       return "Usuario cadastrado com sucesso";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

function atualizarUsuario($nome, $email, $senha,$tipo, $id) {
     require_once 'connect.php';

    $conn = F_conect();
    $sql = " UPDATE usuario SET  nome='" . $nome . "', email='" . $email . " ', senha='" .
            $senha . "' , tipo='".$tipo."' WHERE id= " . $id;

    if ($conn->query($sql) === TRUE) {
       
       return "Usuario atualizado com sucesso";
    } else {
       return "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

function excluirUsu($id) {
   require_once 'connect.php';

    $conn = F_conect();

    $sql = "DELETE FROM usuario WHERE id=" . $id;
    if ($conn->query($sql)) {
                return "Usuario excluído com sucesso";

            }else{
                return "Error: " . $sql . "<br>" . $conn->error;

            }

            $conn->close();
}
}
