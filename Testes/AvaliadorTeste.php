<?php

require '../vendor/autoload.php';

use Alura\Leilao\Model\Avaliador;
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;


$leilao = new Leilao('PlayStation 5');

$erick = new Usuario('Erick');
$giovana = new Usuario('Giovana');

$leilao->recebeLance(new Lance($erick, 4000));
$leilao->recebeLance(new Lance($giovana, 6200));


$avaliador = new Avaliador();
$avaliador->avalia($leilao);

echo $avaliador->get_maior_valor_leilao();