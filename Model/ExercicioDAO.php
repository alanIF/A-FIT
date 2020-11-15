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
class ExercicioDAO {
   
      function listar(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select * from exercicio");
        $i = 0;
        $exercicios= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                    $exercicios[$i]['id'] = $row['id'];
                    $exercicios[$i]['nome'] = $row['nome'];
                                        $exercicios[$i]['demostracao'] = $row['image'];

                    $exercicios[$i]['grupo'] = $row['grupo'];
                    $exercicios[$i]['intervalo'] = $row['intervalo'];
                    $exercicios[$i]['serie'] = $row['serie'];
                    $exercicios[$i]['repeticao'] = $row['repeticao'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $exercicios;
    }
     function getExercicio($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select * from exercicio where id='".$id."'");
        $i = 0;
        $exercicios= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                    $exercicios[$i]['id'] = $row['id'];
                    $exercicios[$i]['nome'] = $row['nome'];
                                        $exercicios[$i]['demostracao'] = $row['image'];

                    $exercicios[$i]['grupo'] = $row['grupo'];
                    $exercicios[$i]['intervalo'] = $row['intervalo'];
                    $exercicios[$i]['serie'] = $row['serie'];
                    $exercicios[$i]['repeticao'] = $row['repeticao'];
                
                 
                    $i++;
                }
        }
       $conn->close();
       return $exercicios;
    }
     
    
    function cadastrar($nome,$image,$grupo,$intervalo, $serie,$repeticao){
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "INSERT INTO exercicio(nome, image, grupo, intervalo, serie, repeticao)
                VALUES('" . $nome . "','" . $image ."' , '".$grupo."', '".$intervalo."' , '".$serie."' , '".$repeticao."' )";
        if ($conn->query($sql) == TRUE) {
            return "Exercício cadastrado com sucesso";
            

        } else {
            return  "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function atualizar($nome,$image,$grupo,$intervalo, $serie,$repeticao, $id){
        require_once 'connect.php';
        $conn = F_conect();
        $sql = "update exercicio set nome='".$nome."' , image='".$image."' , grupo='".$grupo."' ,  intervalo='".$intervalo."' , serie='".$serie."' , repeticao='".$repeticao."'     where id='".$id."'";
        if ($conn->query($sql) == TRUE) {
                        return "Exercicio atualizada com sucesso";

                
                            } else {
                                return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function excluirExercicio($id) {
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "DELETE FROM exercicio WHERE id=" . $id ;

        if ($conn->query($sql)) {
            return "Exercicio excluído com sucesso";
            
        }else{
            return "Error: " . $sql . "<br>" . $conn->error;
           
        }

        $conn->close();
      
}
}


