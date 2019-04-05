
    <?php
        require_once 'class/campeonato-class.php';
        require_once 'class/jogo-class.php';
        require_once 'class/time-class.php';
        require_once 'config/bdconfig.php';
          
        //verifica se passou id no link (evitar bug)
        if(isset($_GET['id'])){
            $id = $_GET ['id'];
            //verifica se ID tem valor e se ID não é um numero - setar id 0 (evitar bug)
            if ($_GET['id'] =='' || !is_numeric ($id)){
                $id = 0;
            }
            $camp = new campeonato ($id);
            
            if (null == ($camp->getCampNome()) ){
                $status = 3;
                 require_once 'page/inicio.php';
            }else{

            $n = 0;
            $sql = "SELECT * FROM time  WHERE `time_refCampeonato` = " . $id . "  ORDER BY `time_pontos` DESC"  ;
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                $time[$n] = new time($row["time_id"]);
                $timeID[$n] = $row["time_id"];
                $n ++;
            }
    ?>
            <table cellspacing='0' cellpadding='2'>
                <tr>
                        <?php 
                            if (!empty($time)){
                                $totalTimes = sizeof($time);
                            }
                            if (!empty($totalTimes)){
                                echo "<td rowspan='10'>";
                                $j = 0;
                                $n = 0;
                                shuffle($timeID);
                                //verifica se tem numero par de time
                                if (($totalTimes % 2) <> 1){
                                    //se for par, divide por 2 para ver total de partidas na rodada
                                        $totalPartidas = $totalTimes / 2;
                                }else{
                                    // se for impar, tira um time e divide por dois, para calcular total de partidas
                                    $totalPartidas = ($totalTimes - 1 ) / 2;
                                }
                                while ( $j < $totalPartidas ){
                                $jogo[$j] = new jogo();
                                $jogo[$j]->comecarPartida($timeID[$n], $timeID[$n + 1], "1", "2");
                                echo $time[$n]->getNome() . " vs " . $time[$n+1]->getNome() . "<br>";
                                $j++;
                                $n++;
                                $n++;
                                }
                            echo "</td>";
                            }

                        ?>
                    <td colspan="7">
                        <h2> 
                            <?php  
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

                    $n = 0;
                    while ($n < $totalTimes){
                        echo "<tr>
                            <td class='alinhar-e'>{$time[$n]->getNome()}</td>
                            <td class='alinhar-e'>{$time[$n]->getPontos()}</td>
                            <td class='alinhar-e'>{$time[$n]->getSaldoGols()}</td>
                            <td class='alinhar-e'>{$time[$n]->getGolsSofridos()}</td>
                            <td class='alinhar-e'>{$time[$n]->getVitoria()}</td>
                            <td class='alinhar-e'>{$time[$n]->getDerrotas()}</td>
                            <td class='alinhar-e'>{$time[$n]->getEmpate()}</td>
                            </tr>";
                        $n ++;
                    }
               
                
            }
        }else{
            require_once 'page/error.php';
        }
?>

        </table>

        