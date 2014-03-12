<?php

Class Fachada{
    private static $instance;
    private function __construct(){}

    public static function getInstance(){
        if (!isset(self::$instance)) {
                $c = __CLASS__;
                self::$instance = new $c;
        }
        return self::$instance;
    }

    /* --------- Usuário --------- */
    public function insertUsuario(UsuarioVO $vo){
        $dao = new UsuarioDAO();

        try{
            return $dao->insert($vo);
        }catch( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }

 public function insertUsuarioByFB(UsuarioVO $vo){
        $dao = new UsuarioDAO();

        try{
            return $dao->insertFB($vo);
        }catch( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }




    public function countUsuario(){
        $dao = new UsuarioDAO();

        try{
            return $dao->countAll();
        }catch( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }


    public function selectUsuario(UsuarioVO $vo){
        $dao = new UsuarioDAO();

        try{
            return $dao->selectOne($vo);
        }catch( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }

    public function selectUsuarioByFB(UsuarioVO $vo){
        $dao = new UsuarioDAO();

        try{
            return $dao->selectOneFB($vo);
        }catch( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }




}

?>