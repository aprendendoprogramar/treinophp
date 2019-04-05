<?php

class jogo {
    
    private $timeVisitante;
    public $timeCasa;
    private $golsTimeVisitante;
    private $golsTimeCasa;
    private $rodada;
    private $refCampeonato;
    
    public function SetarBancoDados(){
        require 'config/bdconfig.php';
        $sql = 
    "INSERT INTO partida (part_id, part_refCampeonato, part_timeCasaID, part_VisitanteID, part_placarCasa, part_placarVisi, part_rodada, part_data)
        VALUES 
    ('','" . $this->getRefCampeonato() . "','','1','2','3','12','' )";
    //'". $this->getRefCampeonato() . "', '". $this->getTimeCasa() . "', '". $this->getTimeVisitante() . "', '". $this->getGolsTimeCasa() . "', '". $this->getGolsTimeVisitante() . "', '" . $this->getRefCampeonato . "', GETUTCDATE())";
    mysqli_query($conn,$sql) or die("Erro ao tentar cadastrar registro");
    mysqli_close($conn);
    }
    public function comecarPartida($t1,$t2,$camp, $rodada){
        
        if ($t1 != $t2){
            //confirmar se sao times diferentes
            //setar os times
            $this->setTimeCasa($t1);
            $this->setTimeVisitante($t2);
            $this->setRodada($rodada);
            $this->setRefCampeonato($camp);
            //começar a partida || Vamos calcular os gols
            //
            //aleatorio compensando o nivel do time
            $golsCasa = rand (0,7);
            $golsVisitante = rand (0,7);
            //setar na variavel
            $this->setGolsTimeCasa($golsCasa);
            $this->setGolsTimeVisitante($golsVisitante);
            
            
            //$this->SetarBancoDados();
            //
            //resultado do jogo
        }
    }
    
    function getTimeVisitante() {
        return $this->timeVisitante;
    }
    function getTimeCasa() {
        return $this->timeCasa;
    }
    function getGolsTimeVisitante() {
        return $this->golsTimeVisitante;
    }
    function getGolsTimeCasa() {
        return $this->golsTimeCasa;
    }
    function getRodada() {
        return $this->rodada;
    }
    function getRefCampeonato() {
        return $this->refCampeonato;
    }
    
    function setTimeVisitante($timeVisitante) {
        $this->timeVisitante = $timeVisitante;
    }
    function setTimeCasa($timeCasa) {
        $this->timeCasa = $timeCasa;
    }
    function setGolsTimeVisitante($golsTimeVisitante) {
        $this->golsTimeVisitante = $golsTimeVisitante;
    }
    function setGolsTimeCasa($golsTimeCasa) {
        $this->golsTimeCasa = $golsTimeCasa;
    }
    function setRodada($rodada) {
        $this->rodada = $rodada;
    }
    function setRefCampeonato($refCampeonato) {
        $this->refCampeonato = $refCampeonato;
    }
}
?>
