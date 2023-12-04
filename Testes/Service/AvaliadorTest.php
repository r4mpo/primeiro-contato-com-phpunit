<?php

namespace Testes\Service;

use Alura\Leilao\Model\Avaliador;
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use PHPUnit\Framework\TestCase;

class AvaliadorTest extends TestCase
{
    // Teste automatizado!!
    // Executa a funções para capturar o maior/menor valor!!

    // PhpUnit percorre todas funções com o prefixo "test";

    public function teste_verifica_se_o_avaliador_consegue_descobrir_o_maior_lance()
    {
        $leilao = new Leilao('PlayStation 5');

        $erick = new Usuario('Erick');
        $giovana = new Usuario('Giovana');

        $leilao->recebeLance(new Lance($erick, 4000));
        $leilao->recebeLance(new Lance($giovana, 6200));


        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $maior_valor = $avaliador->get_maior_valor_leilao();
        $valor_esperado = 6200;

        $this->assertEquals($valor_esperado, $maior_valor);
    }

    public function teste_verifica_se_o_avaliador_consegue_descobrir_o_menor_lance()
    {
        $leilao = new Leilao('PlayStation 5');

        $erick = new Usuario('Erick');
        $giovana = new Usuario('Giovana');

        $leilao->recebeLance(new Lance($erick, 4000));
        $leilao->recebeLance(new Lance($giovana, 6200));


        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $menor_valor = $avaliador->get_menor_valor_leilao();
        $valor_esperado = 4000;

        $this->assertEquals($valor_esperado, $menor_valor);
    }

    public function teste_verifica_se_o_avaliador_consegue_descobrir_os_tres_maiores_lances()
    {
        $leilao = new Leilao('Polystation 777');

        $erick = new Usuario('Erick');
        $giovana = new Usuario('Giovana');
        $eduardo = new Usuario('Eduardo');
        $gilmar = new Usuario('Gilmar');
        $renata = new Usuario('Renata');
        $juliana = new Usuario('Juliana');
        $clayton = new Usuario('Clayton');
        $jf = new Usuario('JF');


        $leilao->recebeLance(new Lance($erick, 1000));
        $leilao->recebeLance(new Lance($giovana, 2000));
        $leilao->recebeLance(new Lance($eduardo, 3000));
        $leilao->recebeLance(new Lance($gilmar, 4000));
        $leilao->recebeLance(new Lance($renata, 5000));
        $leilao->recebeLance(new Lance($juliana, 6000));
        $leilao->recebeLance(new Lance($clayton, 7000));
        $leilao->recebeLance(new Lance($jf, 8000));


        $avaliador = new Avaliador();
        $avaliador->avalia($leilao);

        $tres_maiores_valores = $avaliador->get_3_maiores_valores_leilao();
        $valor_esperado = [8000, 7000, 6000];

        $this->assertEquals($valor_esperado, $tres_maiores_valores);
    }
}
