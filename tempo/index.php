<html>
    <head>
        <meta charset="UTF-8"/>
        <title>DataTime</title>
        <style>
        </style>
    </head>
    <body>
        
        <?php require_once 'tempo.php'; ?>
        
    <center>
        <h2>DataTime</h2>
        
        <?php        
            echo "data Servidor: " . date() . "<br/>";
            // Imprime a data atual 21/10/2017

            echo "data Servidor: " .  date('Y') . "<br/>";
            // Imprime somente o ano atual 2017

            $minha_data = '2017-10-21 10:30:00';
            echo "Minha DAta: " . $minha_data  . "<br/>";
            
            echo date('H:i:s', strtotime($minha_data )) . "<br/>";
            // Imprime somente a hora/minuto/segundo da var�vel $minha_data 10:30:00

            echo date('d/m/Y', strtotime($minha_data )) . "<br/>";
            // Imprime somente a data da var�vel $minha_data com barras 21/10/2017

            
            
            // Inst�ncia um objeto DateTime passando a data 1
            $datetime1 = new DateTime('31-01-1988');

            // Inst�ncia um objeto DateTime passando a data 2
            $datetime2 = new DateTime(date('d/m/Y'));

            // Captura a diferen�a entre a data 1 e a data 2
            $interval = $datetime1->diff($datetime2);

            // Exibe a diferen�as em dias
            echo $interval->format('%a dias');
            
            $diferenca = $interval->format('%h minuts');
            
            echo $diferenca;
            // Imprime +65 dias
            
            
//$numberOfSeconds = strtotime("05/05/2011"), strtotime("11/07/2001");

echo " N�mero de segundos entre as datas " . $numberOfSeconds ;
        ?>
        
        

    </center>
    </body>
</html>
