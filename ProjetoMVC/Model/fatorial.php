<?php
    class Fatorial {
        public function fatorial(){
            $numero = $_POST['fatorial'];
            $c = $numero;
            $fat = 1;
            while($c >= 1){
                $fat = $fat * $c;
                $c--;
            }
            echo"O numero fatoriado e $fat";
        }
    }
    

?>