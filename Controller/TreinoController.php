<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExercicioController
 *
 * @author PICHAU
 */
class TreinoController {
     public function listar(){
        require_once '../Model/TreinoDAO.php';
        $treinos = new TreinoDAO();
        return $treinos->listar();
    }
    public function getTreino($id){
        require_once '../Model/TreinoDAO.php';
        $treinos = new TreinoDAO();
        return $treinos->getTreino($id);
    }
     public function excluirTreino($id){
        require_once ('../Model/TreinoDAO.php');
        $treino  = new TreinoDAO();

        return $treino->excluirTreino($id);

    }
    public function cadastrarTreino($aluno,$d_inicio,$d_fim,$observacao){
        require_once ('../Model/TreinoDAO.php');
        $treino  = new TreinoDAO();

        return $treino->cadastrar($aluno,$d_inicio,$d_fim,$observacao);
    }
      public function atualizarTreino($d_inicial,$d_final,$observcao,$id){
        require_once ('../Model/TreinoDAO.php');
        $treino = new TreinoDAO();

        return $treino->atualizar($d_inicial,$d_final,$observcao,$id);
    }
}
