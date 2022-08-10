<?php

namespace APP\Model;

class Jogador
{
    private int $id;
    private string $nome;
    private string $nacionalidade;
    private string $time;
    private float $idade;
    private float $numero_camisa;
    private string $posicao;
    private bool $ativo;

    public function __construct(
        string $nome,
        string $nacionalidade,
        string $time,
        float $idade,
        float $numero_camisa,
        string $posicao,
        int $id = 0,
        bool $ativo = true

    ) {
        $this->id = $id;
        $this->nome = $nome;
        $this->nacionalidade = $nacionalidade;
        $this->time = $time;
        $this->idade = $idade;
        $this->numero_camisa = $numero_camisa;
        $this->posicao = $posicao;
        $this->ativo = $ativo;
    }
    public function __get($atributo)
    {
        return $this->$atributo;
    }
}
