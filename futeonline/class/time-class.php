<?php
class time{
    private $nome;
    private $pontos;
    private $saldoGols;
    private $golsSofridos;
    private $vitoria;
    private $derrotas;
    private $empate;

    public function __construct($id) {
        
        require 'config/bdconfig.php';
        $sql = "SELECT * FROM time  WHERE `time_id` = " . $id  ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $this->setNome($row["time_nome"]);
            $this->setPontos($row["time_pontos"]);
            $this->setSaldoGols($row["time_golsFeitos"]);
            $this->setDerrotas($row["time_derrotas"]);
            $this->setGolsSofridos($row["time_golsSofridos"]);
            $this->setEmpate($row["time_empates"]);
            $this->setVitoria($row["time_vitorias"]);
            $this->setDerrotas($row["time_derrotas"]);
            }
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
    function setVitoria($vitorias) {
        $this->vitoria = $vitorias;
        
    }
    function setDerrotas($derrotas) {
        $this->derrotas = $derrotas;
    }
    function setEmpate($empates) {
        $this->empate = $empates;
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

