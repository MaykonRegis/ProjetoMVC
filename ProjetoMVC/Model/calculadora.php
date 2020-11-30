<?php
    class Calculadora {
        public function calculadora(){
            $numero = $_POST['calculadora'];
            $multi = $_POST['multi'];
            $divi = $_POST['divi'];
            $som = $_POST['soma'];
            $sub = $_POST['sub'];

            $multiplicacao = $numero * $multi;
            $divisao = $numero / $divi;
            $soma  = $numero + $som;
            $subitracao = $numero - $sub;

            echo"O numero escolhido foi $numero </br></br>";
            echo "O resultado da multiplicação e $multiplicacao </br>";
            echo "O resultado da divisão e $divisao </br>";
            echo "O resultado da soma e $soma </br>";
            echo "O resultado da subitração e $subitracao </br>";
        }
    }
    


?>