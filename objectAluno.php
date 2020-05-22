<?php  
    class Aluno {
        //Variaveis do objeto
        var $nome;
        var $idade;
        var $cep;
        var $estado;
        var $cidade;
        var $bairro;
        var $rua;

        //funcoes get e set do objeto

        function setNome($param){
            $this->nome = $param;
        }

        function setIdade($param){
            $this->idade = $param;
        }

        function setCep($param){
            $this->cep = $param;
        }

        function setEstado($param){
            $this->estado = $param;
        }

        function setCidade($param){
            $this->cidade = $param;
        }

        function setBairro($param){
            $this->bairro = $param;
        }

        function setRua($param){
            $this->rua = $param;
        }

        function getNome(){
            return $this->nome;
        }

        function getIdade(){
            return $this->idade;
        }

        function getCep(){
            return $this->cep;
        }

        function getEstado(){
            return $this->estado;
        }

        function getCidade(){
            return $this->cidade;
        }

        function getBairro(){
            return $this->bairro;
        }

        function getRua(){
            return $this->rua;
        }

    }
?>