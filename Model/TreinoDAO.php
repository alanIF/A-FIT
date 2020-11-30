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
class TreinoDAO {
   
      function listar(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select t.id id,t.data_inicial d_inicial, t.data_final d_final, u.nome aluno, t.observacao obs  from treino t, usuario u where t.id_usuario=u.id");
        $i = 0;
        $treinos= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                    $treinos[$i]['id'] = $row['id'];
                    $treinos[$i]['d_inicial'] = $row['d_inicial'];
                    $treinos[$i]['d_final'] = $row['d_final'];
                    $treinos[$i]['observacao'] = $row['obs'];
                    $treinos[$i]['aluno'] = $row['aluno'];

                  
                 
                    $i++;
                }
        }
       $conn->close();
       return $treinos;
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
    function excluirTreino($id) {
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "DELETE FROM treino WHERE id=" . $id ;

        if ($conn->query($sql)) {
            return "Treino excluído com sucesso";
            
        }else{
            return "Error: " . $sql . "<br>" . $conn->error;
           
        }

        $conn->close();
      
}
}


