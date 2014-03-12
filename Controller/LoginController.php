<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/12/14
 * Time: 1:42 AM
 */

class Login extends Controller {

    public function logaUsuario() {

        $data = $this->request->post();

        $fachada = Fachada::getInstance();
        //$fachada = new Fachada();
        $vo = new UsuarioVO();
        $vo->setEmail($data['login']);
        $vo->setSenha(MD5($data['senha']));

        $usuario = $fachada->selectUsuario($vo);

        $retorno = $this->getResponse($usuario);


        echo $retorno;


    }

    public function logaUsuarioFB() {

        $data = json_decode($this->request->getBody());
        /*
        [id] => 789369499
        [name] => Rodrigo Carneiro
        [gender] => male
        */


        $data = (array)$data;
        $fachada = Fachada::getInstance();
        //$fachada = new Fachada();
        $vo = new UsuarioVO();
        $vo->setEmail($data['id']);
        $vo->setApelido($data['name']);
        $vo->setSexo($data['gender']);

        try {
            $usuario = $fachada->selectUsuarioByFB($vo);

            if (!$usuario) {
                $fachada->insertUsuarioByFB($vo);
                $usuario = $fachada->selectUsuarioByFB($vo);

            }
        } catch (Exception $e) {
            $retorno = $this->getResponse($usuario);
        }


        $retorno = $this->getResponse($usuario);

        echo $retorno;


    }

    private function getResponse($usuario) {

        $retorno = array(

            "status" => ($usuario != false),
            "usuario" => ($usuario != false) ? $this->getUser($usuario) : ''
        );
        return json_encode($retorno);
    }

    private function getUser(UsuarioVO $data) {

        return array(
            "userID" => $data->getIdUsuario(),
            "nome" => $data->getApelido(),
            "sexo" => $data->getSexo(),
            "pontos" => 804,
            "engajamento" => 94,
            "categoria" => 4,
            "nivel" => 0
        );
    }

} 