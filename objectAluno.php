<?php

class Aluno
{
    //Variaveis do objeto
    private $nome;
    private $idade;
    private $cep;
    private $estado;
    private $cidade;
    private $bairro;
    private $rua;

    //funcoes get e set do objeto

    public function setNome($param)
    {
        $this->nome = $param;
    }

    public function setIdade($param)
    {
        $this->idade = $param;
    }

    public function setCep($param)
    {
        $this->cep = $param;
    }

    public function setEstado($param)
    {
        $this->estado = $param;
    }

    public function setCidade($param)
    {
        $this->cidade = $param;
    }

    public function setBairro($param)
    {
        $this->bairro = $param;
    }

    public function setRua($param)
    {
        $this->rua = $param;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getIdade()
    {
        return $this->idade;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function getRua()
    {
        return $this->rua;
    }
}
