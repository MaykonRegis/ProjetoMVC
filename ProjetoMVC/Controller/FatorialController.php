<?php
     class FatorialController {
        public function index(){
            //return 'Ola';
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader,);
            $template = $twig->load('fatorial.html');
    
            $paramentro = array();
            $conteudo = $template->render($paramentro); // ARMAZENA ESSE CONTEUDO DA HOME NUMA VARIAVEL 
            echo $conteudo; // COMANDO PARA EXIBIR O CONTEUDO DE HOME 
        }

        public function calcular(){
            $fatorial = new Fatorial;
            $fatorial->fatorial();
        }
    }    
?>

