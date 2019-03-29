<?php

class jogo {
    
    private $timeVisitante;
    private $timeCasa;
    private $golsTimeVisitante;
    private $golsTimeCasa;
    
    public function comecarPartida($t1,$t2){
        if ($t1 != $t2){
            //confirmar se sao times diferentes
            //setar os times
            $this->timeCasa = $t1;
            $this->timeVisitante = $t2;
            //começar a partida || Vamos calcular os gols
            //calcular nivel do time
            $forcaCasa = ($this->timeCasa->getForca() - $this->timeVisitante->getForca())/5 ; //15
            $forcaVisitante = ($this->timeVisitante->getForca() - $this->timeCasa->getForca())/5 ; //15
            //aleatorio compensando o nivel do time
            $golsCasa = rand (0,(2 + $forcaCasa));
            if ($golsCasa < 0){ $golsCasa = 0;}
            $golsVisitante = rand (0,(2 + $forcaVisitante));
            if ($golsVisitante < 0){ $golsVisitante = 0;}
            //setar na variavel
            $this->setGolsTimeCasa($golsCasa);
            $this->setGolsTimeVisitante($golsVisitante);
            //setar gols feito no historico do time
            $this->timeCasa->setSaldoGols($this->timeCasa->getSaldoGols() + $golsCasa);
            $this->timeVisitante->setSaldoGols($this->timeVisitante->getSaldoGols() + $golsVisitante);
            //setar gols sofrido no historico do time
            $this->timeCasa->setGolsSofridos($this->timeVisitante->getGolsSofridos() + $golsCasa);
            $this->timeVisitante->setGolsSofridos($this->timeCasa->getGolsSofridos() + $golsVisitante);

            //verifca time vencedor
            if ($golsCasa > $golsVisitante){
                //time casa ganhou
                $this->timeCasa->setVitoria();
                $this->timeVisitante->setDerrotas();
                //setar pontos
                $this->timeCasa->setPontos(3);
            }else if($golsCasa < $golsVisitante){
                //time visitante ganhou
                $this->timeCasa->setDerrotas();
                $this->timeVisitante->setVitoria();
                //setar pontos
                $this->timeVisitante->setPontos(3);
            } else if ($golsCasa === $golsVisitante){
                //empate
                $this->timeCasa->setEmpate();
                $this->timeVisitante->setEmpate();
                //setar pontos
                $this->timeCasa->setPontos(1);
                $this->timeVisitante->setPontos(1);
            }
            
            //resultado do jogo
            echo $this->timeCasa->getNome() . " " . $golsCasa . " X " . $golsVisitante . " " . $this->timeVisitante->getNome() . "<br />";

            
            $this->timeCasa->setPontos(6);
            
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
}
?>
