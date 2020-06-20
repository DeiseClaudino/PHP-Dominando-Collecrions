<?php
require 'TocadorDeMusica.php';

$musicas = new SplFixedArray(2);

$musicas[0] = 'One Dance';
$musicas[1] = 'Closer';

$musicas->setSize(4);

$musicas[2] = 'Rocketstar';
$musicas[3] = 'Love Yourself';

// Pega o tamanho do FixedArray 
// echo $musicas->getSize();

$tocador = new TocadorDeMusica();
$tocador->adicionarMusicas($musicas);
$tocador->tocarMusica();