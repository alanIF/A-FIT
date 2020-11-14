<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of HomeController
 *
 * @author PICHAU
 */
class HomeController {
     public function qtd_candidatos(){
        require_once '../Model/CandidatoDAO.php';
        $candidatos = new CandidatoDAO();
        return $candidatos->qtd();
    }
    public function qtd_propostas(){
        require_once '../Model/PropostaDAO.php';
        $propostas = new PropostaDAO();
        return $propostas->qtd();
    }
    public function qtd_conquistas(){
        require_once '../Model/ConquistaDAO.php';
        $conquistas = new ConquistaDAO();
        return $conquistas->qtd();
    }
    public function qtd_denuncias(){
        require_once '../Model/DenunciaDAO.php';
        $denuncias = new DenunciaDAO();
        return $denuncias->qtd();
    }
    
}
