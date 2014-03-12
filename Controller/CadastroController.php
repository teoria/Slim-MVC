<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/12/14
 * Time: 4:58 AM
 */

class Cadastro extends Controller{

    protected $msg;

    public function cadastraUsuario() {

        //{"apelido":"","idade":"","sexo":"","email":"","senha":"","confirmacaoDeSenha":""}
        $data = $this->request->post();

        $fachada = Fachada::getInstance();
        //$fachada = new Fachada();
        $vo = new UsuarioVO();
        $vo->setApelido($data['apelido']);
        $vo->setIdade($data['idade']);
        $vo->setSexo($data['sexo']);
        $vo->setEmail($data['email']);
        $vo->setSenha(MD5($data['senha']));

        $usuario = null;

        try {

            if(!$vo->isValid()){ throw new InvalidArgumentException; }
            $usuario = $fachada->selectUsuarioByFB($vo);

            if (!$usuario) {
                $fachada->insertUsuario($vo);
                $usuario = $fachada->selectUsuarioByFB($vo);

            }else{
                $usuario = null;
                $this->msg = "Usuário já cadastrado";
            }
        } catch (Exception $e) {
            $this->msg = "Dados Inválidos";

        }

        $retorno = $this->getResponse($usuario);


        echo $retorno;


    }

    private function getResponse($usuario) {

        $retorno = array(

            "status" => ($usuario != false),
            "mensagem" => $this->msg
        );
        return json_encode($retorno);
    }

} 