<html>
    <head>
        <meta charset="UTF-8"/>
        <title>Futebol 2020</title>
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

<?php
    require_once 'jogo-class.php';
    require_once 'time-class.php';
    
    $time[1] = new time("Varzea Futebol Clube", 95);
    $time[2] = new time("Gramados Unity", 85);
    $time[3] = new time("Europa Time", 75);
    $time[4] = new time("Boleiros Unidos", 85);
    $time[5] = new time("Time Mineiro", 75);
    $time[6] = new time("Paulistinha FC", 65);
    
    $j = 0;
    $totalTimes = 6;
    $numeroJogos = 50;
    while ( $j < $numeroJogos ){
    $jogo[$j] = new jogo();
    $jogo[$j]->comecarPartida($time[rand(1,$totalTimes)], $time[rand(1,$totalTimes)]);
    
    $j++;
    }
?>

        <table cellspacing='0' cellpadding='2'>
            <tr>
                <td colspan="7">
                    <h2>Futebol Clube 2020</h2>
                </td>
            </tr>
            
            <tr>
                <td style="width:400px;" class='alinhar-e'>Times</td>
                <td style="width:100px;">Pontos</td>
                <td style="width:100px;">Saldo de Gols</td>
                <td style="width:100px;">Gols Sofrido</td>
                <td style="width:100px;">Vitorias</td>
                <td style="width:100px;">Derrotas</td>
                <td style="width:100px;">Empates</td>
            </tr>
            <?php 
            
            $i = 1;
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
            ?>

        </table>

    </body>
</html>