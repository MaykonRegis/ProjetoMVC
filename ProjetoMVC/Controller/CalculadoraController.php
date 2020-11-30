<?php
     class CalculadoraController {
        public function index(){
            //return 'Ola';
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader,);
            $template = $twig->load('calculadora.html');
    
            $paramentro = array();
            $conteudo = $template->render($paramentro); // ARMAZENA ESSE CONTEUDO DA HOME NUMA VARIAVEL 
            echo $conteudo; // COMANDO PARA EXIBIR O CONTEUDO DE HOME 
        }

        public function calcular(){
            $calculadora = new Calculadora;
            $calculadora->calculadora();
            header('Location: http://localhost/projetoMvc/calculadora');
        }
    }    
?>

