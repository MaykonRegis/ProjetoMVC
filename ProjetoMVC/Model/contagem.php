<?php
    class Contagem {
        public function contagem(){
            $numero = $_POST['contagem'];
            $c = 0;
            while($c <= $numero){
                $c++;
                echo" $c";
            }
        }
    }


?>