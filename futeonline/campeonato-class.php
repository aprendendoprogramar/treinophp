<?php
class campeonato{
    public $campId;
    private $campSenha;
    private $campEmail;
    private $campNome;
    private $campNumeroRodadas;
    private $campTotalTimes;
    private $campDataCriado;
    private $campDataUltimaPartida;

            
    public function __construct($id) {
        
        require 'bdconfig.php';
        $sql = "SELECT * FROM campeonato WHERE camp_id = ". $id  ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $this->campSenha = $row["camp_senha"];
            $this->campEmail = $row["camp_email"];
            $this->campNome = $row["camp_nome"];
            $this->campNumeroRodadas  = $row["camp_numeroRodadas"];
            $this->campTotalTimes = $row["camp_totalTimes"];
            $this->campDataCriado = $row["camp_dataCriado"];
            $this->campDataUltimaPartida = $row["camp_dataUltimaPartida"];
        }
        $this->campId = $id;
        
        
    }
    
    function getCampId() {
        return $this->campId;
    }
    private function getCampSenha() {
        return $this->campSenha;
    }
    function getCampEmail() {
        return $this->campEmail;
    }
    function getCampNome() {
        return $this->campNome;
    }
    function getCampNumeroRodadas() {
        return $this->campNumeroRodadas;
    }
    function getCampTotalTimes() {
        return $this->campTotalTimes;
    }
    function getCampDataCriado() {
        return $this->campDataCriado;
    }
    function getCampDataUltimaPartida() {
        return $this->campDataUltimaPartida;
    }
    
    
    function setCampSenha($campSenha) {
        $this->campSenha = $campSenha;
    }
    function setCampEmail($campEmail) {
        $this->campEmail = $campEmail;
    }
    function setCampNumeroRodadas($campNumeroRodadas) {
        $this->campNumeroRodadas = $campNumeroRodadas;
    }
    function setCampTotalTimes($campTotalTimes) {
        $this->campTotalTimes = $campTotalTimes;
    }
    function setCampDataCriado($campDataCriado) {
        $this->campDataCriado = $campDataCriado;
    }
    function setCampDataUltimaPartida($campDataUltimaPartida) {
        $this->campDataUltimaPartida = $campDataUltimaPartida;
    }

}

