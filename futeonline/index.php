<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Fute 2020 Online</title>
        <link rel="stylesheet" type="text/css" href="estilo.css">
        <style>
            h2 {
                font-size:50px;
                color: #3e4041;
            }
            table, tr, td{
               border:1px solid black;
               text-align:center;
            }
            .alinhar-e{
                text-align:left;
            }
            body
            {
                background-color: #81F79F;
            }

        </style>
    </head>
    <body>
    <center>

    <?php
        require_once 'campeonato-class.php';
        require_once 'jogo-class.php';
        require_once 'time-class.php';
        require_once 'bdconfig.php';
        $id = $_GET ['id'];
        
        $n = 1;
        $sql = "SELECT * FROM time  WHERE `time_refCampeonato` = " . $id  ;
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            $time[$n] = new time($row["time_nome"]);
            $n ++;
        }
   ?>

        <table cellspacing='0' cellpadding='2'>
            <tr>
                <td rowspan="10">
                    <?php 
                        if (!empty($time)){
                            $totalTimes = sizeof($time);
                        }
                        
                        if (!empty($totalTimes)){
                            $j = 0;
                            $numeroJogos = 10;
                            while ( $j < $numeroJogos ){
                            $jogo[$j] = new jogo();
                            $jogo[$j]->comecarPartida($time[rand(1,$totalTimes)], $time[rand(1,$totalTimes)]);
                            $j++;
                            }
                        }
                        
                    ?>
                </td>
                <td colspan="7">
                    <h2> 
                        <?php  
                        $camp = new campeonato ($id);
                        echo $camp->getCampNome();
                        ?>
                    </h2>
                </td>
            </tr>
            
            <tr>
                <td style="width:400px;" class='alinhar-e'>Times</td>
                <td style="width:70px;">Pontos</td>
                <td style="width:70px;">Saldo de Gols</td>
                <td style="width:70px;">Gols Sofrido</td>
                <td style="width:70px;">Vitorias</td>
                <td style="width:70px;">Derrotas</td>
                <td style="width:70px;">Empates</td>
            </tr>
            <?php 
            
            $i = 1;
            if(!empty($totalTimes)){
                while ( $i <= $totalTimes){
                    echo "<tr>
                            <td class='alinhar-e'>{$time[$i]->getNome()}</td>
                            <td>{$time[$i]->getPontos()}</td>
                            <td>{$time[$i]->getSaldoGols()}</td>
                            <td>{$time[$i]->getGolsSofridos()}</td>
                            <td>{$time[$i]->getVitoria()}</td>
                            <td>{$time[$i]->getDerrotas()}</td>
                            <td>{$time[$i]->getEmpate()}</td>
                        </tr>";
                    $i ++;    
                }
            }
            ?>

        </table>

        
    </center>
    </body>
</html>
