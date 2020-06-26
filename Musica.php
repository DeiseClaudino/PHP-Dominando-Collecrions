<?php

class Musica
{
    private $nome;
    private $vezes_tocada; 

    public function __construct($nome)
    {
        $this->nome         = $nome;
        $this->vezes_tocada = 0;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getVezesTocada()
    {
        return $this->vezes_tocada;
    }

    public function tocar()
    {
        echo "Tocando música: ". $this->getNome() . "<br>";
        $this->vezes_tocada++; 

    }


}