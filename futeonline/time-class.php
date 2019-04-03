<?php
class time{
    private $nome;
    private $pontos;
    private $saldoGols;
    private $golsSofridos;
    private $vitoria;
    private $derrotas;
    private $empate;

    public function __construct($nome) {
        $this->setNome($nome);
        $this->saldoGols = 0;
        $this->pontos = 0;
        $this->golsSofridos = 0;
        $this->vitoria = 0;
        $this->empate = 0;
        $this->derrotas = 0;
    }
    
    function setNome($nome) {
        $this->nome = $nome;
    }
    function setPontos($pontos){
        $this->pontos = $this->getPontos() + $pontos;
    }
    function setSaldoGols($saldoGols) {
        $this->saldoGols = $saldoGols;
    }
    function setGolsSofridos($golsSofridos) {
        $this->golsSofridos = $golsSofridos;
    }
    function setVitoria() {
        $this->vitoria = $this->getVitoria() + 1;
        
    }
    function setDerrotas() {
        $this->derrotas = $this->getDerrotas() + 1;
    }
    function setEmpate() {
        $this->empate = $this->getEmpate() + 1;
    }

    function getNome() {
        return $this->nome;
    }
    function getPontos(){
        return $this->pontos;
    }
    function getSaldoGols() {
        return $this->saldoGols;
    }
    function getGolsSofridos() {
        return $this->golsSofridos;
    }
    function getVitoria() {
        return $this->vitoria;
    }
    function getDerrotas() {
        return $this->derrotas;
    }
    function getEmpate() {
        return $this->empate;
    }
}

