<?php

namespace Alura\Leilao\Model;

class Avaliador
{
    private $maior_valor_leilao = -INF;
    private $menor_valor_leilao = INF;
    private $tres_maiores_valores;

    function avalia(Leilao $leilao)
    {
        $lances = $leilao->getLances();
        $arrLances = array();

        foreach ($lances as $lance) 
        {
            if ($lance->getValor() > $this->maior_valor_leilao) {
                $this->maior_valor_leilao = $lance->getValor();
            } 
            
            if ($lance->getValor() < $this->menor_valor_leilao) {
                $this->menor_valor_leilao = $lance->getValor();
            }

            $arrLances[] = $lance->getValor();
        }

        arsort($arrLances);
        $this->tres_maiores_valores = array_slice($arrLances, 0, 3);
    }

    function get_maior_valor_leilao(): float
    {
        return $this->maior_valor_leilao;
    }

    function get_menor_valor_leilao(): float
    {
        return $this->menor_valor_leilao;
    }

    function get_3_maiores_valores_leilao(): array
    {
        return $this->tres_maiores_valores;
    }
}