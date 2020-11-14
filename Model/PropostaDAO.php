<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropostaDAO
 *
 * @author PICHAU
 */
class PropostaDAO {
   
      function listar(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select p.id id , c.nome candidato, p.titulo titulo, p.descricao descricao from proposta p, candidato c where c.id=p.id_candidato");
        $i = 0;
        $propostas= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $propostas[$i]['id'] = $row['id'];
                    $propostas[$i]['candidato'] = $row['candidato'];
                   $propostas[$i]['descricao'] = $row['descricao'];
                   $propostas[$i]['titulo'] = $row['titulo'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $propostas;
    }
    function listar_c($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select p.id id , c.nome candidato, p.titulo titulo, p.descricao descricao from proposta p, candidato c where c.id=p.id_candidato and p.id_candidato='".$id."'");
        $i = 0;
        $propostas= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $propostas[$i]['id'] = $row['id'];
                    $propostas[$i]['candidato'] = $row['candidato'];
                   $propostas[$i]['descricao'] = $row['descricao'];
                   $propostas[$i]['titulo'] = $row['titulo'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $propostas;
    }
     function qtd(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select count(id) qtd from proposta");
        $i = 0;
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $qtd = $row['qtd'];
                 
                    $i++;
                }
        }
       $conn->close();
       return $qtd;
    }
    function getProposta($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select p.id id , c.nome candidato, p.titulo titulo, p.descricao descricao from proposta p, candidato c where c.id=p.id_candidato and p.id='".$id."'");
        $i = 0;
        $propostas= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $propostas[$i]['id'] = $row['id'];
                   $propostas[$i]['candidato'] = $row['candidato'];
                  $propostas[$i]['titulo'] = $row['titulo'];
                   $propostas[$i]['descricao'] = $row['descricao'];
                 
                  
                    $i++;
                }
        }
       $conn->close();
       return $propostas;
    }
    function cadastrar($candidato, $titulo, $descricao){
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "INSERT INTO proposta(id_candidato, titulo, descricao)
                VALUES('" . $candidato . "','" . $titulo ."' , '".$descricao."' )";
        if ($conn->query($sql) == TRUE) {
            return "Proposta cadastrada com sucesso";
            

        } else {
            return  "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function editar($candidato, $titulo, $descricao, $id){
        require_once 'connect.php';
        $conn = F_conect();
        $sql = "update proposta set id_candidato='".$candidato."' , titulo='".$titulo."' , descricao='".$descricao."'      where id='".$id."'";
        if ($conn->query($sql) == TRUE) {
                        return "Proposta atualizada com sucesso";

                
                            } else {
                                return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function delete($id) {
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "DELETE FROM proposta WHERE id=" . $id ;

        if ($conn->query($sql)) {
            return "Proposta excluída com sucesso";
            
        }else{
            return "Error: " . $sql . "<br>" . $conn->error;
           
        }

        $conn->close();
      
}
}


