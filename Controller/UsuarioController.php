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
    public function listar(){
        require_once '../Model/UsuarioDAO.php';
        $usuarios = new UsuarioDAO();
        return $usuarios->listar();
    }
     public function getUsuario($id){
        require_once '../Model/UsuarioDAO.php';
        $usuarios = new UsuarioDAO();
        return $usuarios->getUsuario($id);
    }
    public function cadastrarUsuario($nome,$email,$senha,$tipo){
        require_once ('../Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();

        return $usuario->cadastrar($nome, $email, $senha, $tipo);
    }
    public function excluirUsuario($id){
        require_once ('../Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();

        return $usuario->excluirUsu($id);

    }
    public function verificarLogin(){
        require_once ('../Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();
        $usuario->testLogado();
        
    }
    public function is_admin($tipo){
        require_once ('../Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();
       return  $usuario->is_admin($tipo);
    }
    public function logOut() {
         require_once ('../Model/UsuarioDAO.php');
         $usuario  = new UsuarioDAO();

         $usuario->sair();
    }
    public function atualizarUsuario($nome, $email, $senha,$tipo,$id) {
         require_once ('../Model/UsuarioDAO.php');
        $usuario  = new UsuarioDAO();

        return $usuario->atualizarUsuario($nome, $email, $senha, $tipo,$id);
    }
}

