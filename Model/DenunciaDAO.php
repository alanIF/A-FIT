<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DenunciaDAO
 *
 * @author PICHAU
 */
class DenunciaDAO {
    //put your code here
     function qtd(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select count(id) qtd from denuncia");
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
     function listar(){
        require_once 'connect.php';
        $conn = F_conect();
        $result = mysqli_query($conn, "Select * from denuncia");
        $i = 0;
        $denuncias= array();
        if (mysqli_num_rows($result)) {
            while ($row = $result->fetch_assoc()) {
                   $denuncias[$i]['id'] = $row['id'];
                   $denuncias[$i]['reclamante'] = $row['nome_reclamante'];
                   $denuncias[$i]['reclamado'] = $row['nome_denuciado'];
                   $denuncias[$i]['descricao'] = $row['descricao'];
                   $denuncias[$i]['data'] = $row['data_denuncia'];
                   $denuncias[$i]['situacao_i'] = $row['situacao']; 

                   if($row['situacao']==0){
                           $denuncias[$i]['situacao'] = "Não enviada"; 
                   }else{
                           $denuncias[$i]['situacao'] = "Enviada"; 

                   }
                 
                    $i++;
                }
        }
       $conn->close();
       return $denuncias;
    }
    function enviar($id){
        require_once 'connect.php';
        $conn = F_conect();
        $sql = "update denuncia set situacao='1'       where id='".$id."'";
        if ($conn->query($sql) == TRUE) {
                        return "Denúncia enviada com sucesso";

                
                            } else {
                                return "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    function cadastrar($nome_reclamante, $nome_reclamado, $descricao){
        require_once 'connect.php';

        $conn = F_conect();
        $data_a=date('d/m/yy') ;
        $sql = "INSERT INTO denuncia(nome_reclamante,nome_denuciado, descricao, data_denuncia, situacao)
                VALUES('" . $nome_reclamante . "' , '".$nome_reclamado."' ,'" . $descricao ."' , '".$data_a."', '0')";
        if ($conn->query($sql) == TRUE) {
            return "Denúncia enviada com sucesso";
            

        } else {
            return  "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
}
