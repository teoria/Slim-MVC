<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/12/14
 * Time: 12:50 AM
 */

class UsuarioDAO extends DAO{




    public function insert( UsuarioVO $vo ){


        $sql = "INSERT INTO usuarios ()
              VALUES (

                    )";


        $arrParams = array(
            'nome'=>$vo->getNome(),
            'email'=>$vo->getEmail()
        );



        try{
            $stm = $this->conex->prepare($sql);
            $stm->execute($arrParams);
        }catch (Exception $e){
            throw new Exception("Não foi possível realizar o cadastro.");
        }

    }
    public function insertFB( UsuarioVO $vo ){


        $sql = "INSERT INTO usuarios (email,apelido,sexo)
              VALUES (
                    :idFB,:apelido, :sexo
                    )";


        $arrParams = array(
            ':idFB'=>$vo->getEmail(),
            ':apelido'=>$vo->getApelido(),
            ':sexo'=> $vo->getSexo()
        );



        try{
            $stm = $this->conex->prepare($sql);
            $stm->execute($arrParams);
        }catch (Exception $e){
            throw new Exception("Não foi possível realizar o cadastro.");
        }

    }

    public function countAll(){

        $sql = 'SELECT count(*) as num FROM usuarios';

        $qtd = $this->conex->query($sql);
        $qtd = $qtd->fetch(PDO::FETCH_OBJ);

        return $qtd->num;

    }


    public function selectOne( UsuarioVO $vo ){

        $sql = "SELECT * FROM usuarios WHERE email = :login and senha = :senha";

        $login = $vo->getEmail();
        $senha = $vo->getSenha();

        $stm = $this->conex->prepare($sql);
        $stm->bindParam(':login', $login, PDO::PARAM_STR);
        $stm->bindParam(':senha', $senha, PDO::PARAM_STR);

        try{
            $stm->execute();
        }catch (Exception $e){
            throw new Exception("Não foi possível selecionar o Usuário.");
        }

        $stm->setFetchMode(PDO::FETCH_CLASS, 'UsuarioVO');
        $vo = $stm->fetch(PDO::FETCH_CLASS);
        return $vo;

    }

    public function selectOneFB( UsuarioVO $vo ){

        $sql = "SELECT * FROM usuarios WHERE email = :login";

        $login = $vo->getEmail();
        $senha = $vo->getSenha();

        $stm = $this->conex->prepare($sql);
        $stm->bindParam(':login', $login, PDO::PARAM_STR);

        try{
            $stm->execute();
        }catch (Exception $e){
            throw new Exception("Não foi possível selecionar o Usuário.");
        }

        $stm->setFetchMode(PDO::FETCH_CLASS, 'UsuarioVO');
        $vo = $stm->fetch(PDO::FETCH_CLASS);
        return $vo;

    }


    public function remove( UsuarioVO $vo ){

        $id = $vo->getIdUsuario();

        try{
            $this->conex->exec("DELETE FROM usuario WHERE idusuario = '$id'");
        }catch( Exception $e ){
            throw new Exception("Não foi possível excluir o usuário.");
        }

    }

    public function update( UsuarioVO $vo ){

        $sql = "UPDATE usuario
                SET

                    nome=:subcomponentes_execucao_data_saida_real,
                    subcomponentes_observacoes=:subcomponentes_observacoes,
                    subcomponentes_tendencia=:subcomponentes_tendencia
                WHERE idUsuario=:id";



//PARAMS
        $arrParams = array(
            'id'=>$vo->getIdUsuario(),
            'email'=>$vo->getEmail()
        );


        try{
            $stm = $this->conex->prepare($sql);
            $stm->execute($arrParams);
        }catch (Exception $e){
            throw new Exception("Não foi possível atualizar o usuário.");
        }

    }



} 