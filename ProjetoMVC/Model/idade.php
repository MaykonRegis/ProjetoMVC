<?php
    Class Idade {
        public function idade(){
            $numero = $_POST['idade'];
            $resultado = date("Y") - $numero;
            echo"Sua idade atual e $resultado";
        }
    }


?>