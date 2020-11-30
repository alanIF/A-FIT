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
     function getTreino($id){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select t.id id,t.data_inicial d_inicial, t.data_final d_final, u.nome aluno, t.observacao obs  from treino t, usuario u where t.id_usuario=u.id and t.id='".$id."'");
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
     
    
    function cadastrar($aluno,$d_inicio,$d_fim,$observacao){
        require_once 'connect.php';

        $conn = F_conect();
        $sql = "INSERT INTO treino(id_usuario, data_inicial, data_final, observacao)
                VALUES('" . $aluno . "','" . $d_inicio ."' , '".$d_fim."', '".$observacao."'  )";
        if ($conn->query($sql) == TRUE) {
            return "Treino cadastrado com sucesso";
            

        } else {
            return  "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function atualizar($d_inicial,$d_final,$observcao,$id){
        require_once 'connect.php';
        $conn = F_conect();
        $sql = "update treino set data_inicial='".$d_inicial."' , data_final='".$d_final."' , observacao='".$observcao."'      where id='".$id."'";
        if ($conn->query($sql) == TRUE) {
                        return "Treino atualizada com sucesso";

                
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


