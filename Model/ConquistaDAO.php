<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConquistaDAO
 *
 * @author PICHAU
 */
class ConquistaDAO {
    function listar(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select p.id id , c.nome candidato, p.titulo titulo, p.descricao descricao from conquista p, candidato c where c.id=p.id_candidato");
        $i = 0;
        $conquista= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $conquista[$i]['id'] = $row['id'];
                    $conquista[$i]['candidato'] = $row['candidato'];
                   $conquista[$i]['descricao'] = $row['descricao'];
                   $conquista[$i]['titulo'] = $row['titulo'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $conquista;
    }
    function listar_c($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select p.id id , c.nome candidato, p.titulo titulo, p.descricao descricao from conquista p, candidato c where c.id=p.id_candidato and p.id_candidato='".$id."'");
        $i = 0;
        $conquista= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $conquista[$i]['id'] = $row['id'];
                    $conquista[$i]['candidato'] = $row['candidato'];
                   $conquista[$i]['descricao'] = $row['descricao'];
                   $conquista[$i]['titulo'] = $row['titulo'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $conquista;
    }
     function qtd(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select count(id) qtd from conquista");
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
    function getConquista($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select p.id id , c.nome candidato, p.titulo titulo, p.descricao descricao from conquista p, candidato c where c.id=p.id_candidato and p.id='".$id."'");
        $i = 0;
        $conquistas= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $conquistas[$i]['id'] = $row['id'];
                   $conquistas[$i]['candidato'] = $row['candidato'];
                  $conquistas[$i]['titulo'] = $row['titulo'];
                   $conquistas[$i]['descricao'] = $row['descricao'];
                 
                  
                    $i++;
                }
        }
       $conn->close();
       return $conquistas;
    }
    function cadastrar($candidato, $titulo, $descricao){
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "INSERT INTO conquista(id_candidato, titulo, descricao)
                VALUES('" . $candidato . "','" . $titulo ."' , '".$descricao."' )";
        if ($conn->query($sql) == TRUE) {
            return "Conquista cadastrada com sucesso";
            

        } else {
            return  "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function editar($candidato, $titulo, $descricao, $id){
        require_once 'connect.php';
        $conn = F_conect();
        $sql = "update conquista set id_candidato='".$candidato."' , titulo='".$titulo."' , descricao='".$descricao."'      where id='".$id."'";
        if ($conn->query($sql) == TRUE) {
                        return "Conquista atualizada com sucesso";

                
                            } else {
                                return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function delete($id) {
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "DELETE FROM conquista WHERE id=" . $id ;

        if ($conn->query($sql)) {
            return "Conquista excluída com sucesso";
            
        }else{
            return "Error: " . $sql . "<br>" . $conn->error;
           
        }

        $conn->close();
      
}
}
