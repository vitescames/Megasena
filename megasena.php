<?php

function return_bet(){

    $bet = "";

    $counter = 0;
    $range = range(1,60);
    shuffle($range);

    foreach($range as $num){

        if($counter < 6){

            if($counter != 5){
                $bet = $bet . sprintf("%02d", $num) . ",";
            } else{
                $bet = $bet . sprintf("%02d", $num);
            }

        } else{
            break;
        }

        $counter++;
    }

    $betArray = explode(",", $bet);

    asort($betArray);

    return $betArray;

}

return_bet();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Megasena</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-3">Palpite da Megasena</h1>
                <p class="lead">Simulação de 3 apostas da Megasena feita em PHP, por Vithor Escames.</p>
            </div>
        </div>

        <div class="col-sm-12">

            <div class="row">

                <?php              
                    
                    for($i = 0; $i < 3; $i++){

                        $count_line = 0;
                        $count_columns = 1; 
                        $right_bet = return_bet(); 

                        echo "<div class='col-sm-4'>";

                        echo "<h3 class='title-bet'> Aposta " . ($i + 1) . "</h3>";

                        echo "<table class='bet-table'>";

                        echo "<tbody>";

                        while($count_line < 6){
                            
                            echo "<tr>";

                            for ($j = 0; $j < 10; $j++) {

                                $found = false;

                                foreach($right_bet as $num){

                                    if($num == sprintf("%02d", $count_columns)){
                                        echo "<td class='right-number'>" . sprintf("%02d", $count_columns) . "</td>";
                                        $found = true;
                                        break;
                                    }

                                }

                                if($found == false){

                                    echo "<td>" . sprintf("%02d", $count_columns) . "</td>";

                                }

                                $count_columns++;
                            }

                            echo "</tr>";

                            $count_line++;

                        }

                        echo "</tbody>";

                        echo "</table>";

                        echo "</div>";

                    }

                ?>

            </div>

        </div>

    </body>
</html>