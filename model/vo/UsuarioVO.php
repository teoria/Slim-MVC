<?php
/**
 * Created by PhpStorm.
 * User: teoria
 * Date: 3/12/14
 * Time: 12:49 AM
 */

class UsuarioVO extends VO{
    protected  $id;
    protected $nome;
    protected $apelido;
    protected $idade;
    protected $sexo;
    protected $email;
    protected $senha;
    protected $confirmacaoDeSenha;

    function __construct() {
        $this->requires = array( 'email', 'senha' );
    }

    /**
     * @param mixed $idUsuario
     */
    public function setIdUsuario($idUsuario) {

        $this->id = $idUsuario;
    }

    /**
     * @return mixed
     */
    public function getIdUsuario() {

        return $this->id;
    }


    /**
     * @param mixed $apelido
     */
    public function setApelido($apelido) {

        $this->apelido = $apelido;
    }

    /**
     * @return mixed
     */
    public function getApelido() {

        return $this->apelido;
    }

    /**
     * @param mixed $confirmacaoDeSenha
     */
    public function setConfirmacaoDeSenha($confirmacaoDeSenha) {

        $this->confirmacaoDeSenha = $confirmacaoDeSenha;
    }

    /**
     * @return mixed
     */
    public function getConfirmacaoDeSenha() {

        return $this->confirmacaoDeSenha;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email) {

        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getEmail() {

        return $this->email;
    }

    /**
     * @param mixed $idade
     */
    public function setIdade($idade) {

        $this->idade = $idade;
    }

    /**
     * @return mixed
     */
    public function getIdade() {

        return $this->idade;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome) {

        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNome() {

        return $this->nome;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha) {

        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getSenha() {

        return $this->senha;
    }

    /**
     * @param mixed $sexo
     */
    public function setSexo($sexo) {

        $this->sexo = $sexo;
    }

    /**
     * @return mixed
     */
    public function getSexo() {

        return $this->sexo;
    }


} 