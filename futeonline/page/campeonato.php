
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

                        <?php 
                            if (!empty($time)){
                                $totalTimes = sizeof($time);
                            }

                            if (!empty($totalTimes)){
                                echo "<td rowspan='10'>";
                                $j = 0;
                                $numeroJogos = 10;
                                while ( $j < $numeroJogos ){
                                $jogo[$j] = new jogo();
                                $jogo[$j]->comecarPartida($time[rand(1,$totalTimes)], $time[rand(1,$totalTimes)]);
                                $j++;
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
                }else{
                    echo "<td colspan='10'><br/><br/>O criador deste campeonato ainda não cadastrou times <br/> Se você criou este campeonato clique aqui<br/><br/></tr>";
                }

            } 
        }
        else{
            require_once 'page/error.php';
        }
?>

        </table>

        