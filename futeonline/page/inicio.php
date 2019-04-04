<?php
    if(isset($status)){
        
        if($status == 3){
            echo "Campeonato não encontrado";
        }
    }

?>
<form method="get" action="campeonato.php">
    Digite seu código:
    <input type="text" name="id">
    <input type="submit" value="Acessar">
</form>