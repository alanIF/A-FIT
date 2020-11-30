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
    public function getExercicio($id){
        require_once '../Model/ExercicioDAO.php';
        $exercicios = new ExercicioDAO();
        return $exercicios->getExercicio($id);
    }
     public function excluirTreino($id){
        require_once ('../Model/TreinoDAO.php');
        $treino  = new TreinoDAO();

        return $treino->excluirTreino($id);

    }
    public function cadastrarExercicio($nome,$image,$grupo,$intervalo, $serie,$repeticao){
        require_once ('../Model/ExercicioDAO.php');
        $exercicio  = new ExercicioDAO();

        return $exercicio->cadastrar($nome,$image,$grupo,$intervalo, $serie,$repeticao);
    }
      public function atualizarExercicio($nome,$image,$grupo,$intervalo, $serie,$repeticao,$id){
        require_once ('../Model/ExercicioDAO.php');
        $exercicio  = new ExercicioDAO();

        return $exercicio->atualizar($nome,$image,$grupo,$intervalo, $serie,$repeticao,$id);
    }
}
