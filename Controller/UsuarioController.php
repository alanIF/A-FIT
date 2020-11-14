<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioController
 *
 * @author PICHAU
 */
class UsuarioController {
  
    
    public function Login($email, $senha){
       require_once ('./Model/UsuarioDAO.php');
       $usuario  = new UsuarioDAO();
       $usuario->logar($email, $senha);
    }
    
    public function Cadastrar($nome,$email,$senha){
        require_once ('./Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();

        $usuario->cadastrar($nome, $email, $senha);
    }
    public function verificarLogin(){
        require_once ('../Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();

        $usuario->testLogado();
        
    }
    public function logOut() {
         require_once ('../Model/UsuarioDAO.php');
         $usuario  = new UsuarioDAO();

         $usuario->sair();
    }
    public function atualizar($nome, $email, $senha) {
       require_once ('../Model/USU_Crud.php');

        editarUsu($nome, $email, $senha, $_SESSION['id']);
    }
}

