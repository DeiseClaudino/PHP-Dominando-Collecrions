<?php

class TocadorDeMusica
{

    private $musicas;

    public function __construct()
    {
        // Inicializa a lista ligada
        $this->musicas          =  new SplDoublyLinkedList();
        $this->historico        =  new SplStack(); 
        $this->filaDeDownloads  =  new SplQueue(); 
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
            echo "Tocando música: ". $this->musicas->current() . "<br>";
            $this->historico->push($this->musicas->current());
        }
    }

    public function adicionarMusica($musica)
    {
        $this->musicas->push($musica);

    }

    public function avancarMusica()
    {
        $this->musicas->next();

        if(!$this->musicas->valid())
        {
            $this->musicas->rewind();
        }
    }

    public function voltarMusica()
    {
        $this->musicas->prev();

        if(!$this->musicas->valid())
        {
            $this->musicas->rewind();
        }
    }

    public function exibirMusicas()
    {
        for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next())
        {
            echo "Música: ". $this->musicas->current() . "<br>";
        }

        $this->musicas->rewind();
    }

    public function exibirQuantidadeDeMusicas()
    {
        echo "Existem: ". $this->musicas->count() . " músicas no tocador <br>";
    }

    public function adicionarMusicaNoComecoDaPlaylist($musica)
    {
        $this->musicas->unshift($musica);
    }

    public function removerMusicaDoComecoDaPlaylist()
    {
        $this->musicas->shift();
    }

    public function removerUltimaMusicaDaPlaylist()
    {
        $this->musicas->pop();
    }

    public function tocarUltimaMusicaTocada()
    {
        echo "Tocando do histórico: ". $this->historico->pop() ."<br>"; 
    }

    public function baixarMusicas()
    {
        if($this->musicas->count() > 0)
        {
            for($this->musicas->rewind(); $this->musicas->valid(); $this->musicas->next())
            {
                $this->filaDeDownloads->push($this->musicas->current());
            }

            for($this->filaDeDownloads->rewind(); $this->filaDeDownloads->valid(); $this->filaDeDownloads->next())
            {
                echo "Baixando: " . $this->filaDeDownloads->current() . "...<br>";
            }
        }
        else
        {
            echo "Nenhuma música encontrada para baixar";
        }
    }
}