<?php

class TocadorDeMusica
{

    private $musicas;

    public function __construct()
    {
        // Inicializa a lista ligada
        $this->musicas =  new SplDoublyLinkedList();
        $this->musicas->rewind();

    }

    public function adicionarMusicas(SplFixedArray $musicas )
    {
        for($musicas->rewind(); $musicas->valid(); $musicas->next())
        {
            $this->musicas->push($musicas->current());
        }

        // É importante retornar o ponteiro para a posição inicial sempre que fizermos a iteração do mesmo.
        $this->musicas->rewind();
    }    

    public function tocarMusica()
    {
        if($this->musicas->count() === 0)
        {
            echo "Erro, nenhuma música no tocador";
        }
        else
        {
            echo "Tocando música: ". $this->musicas->current();
        }
    }
}