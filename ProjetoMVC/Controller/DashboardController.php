<?php
     class DashboardController {
        public function index(){
            //return 'Ola';
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader,);
            $template = $twig->load('dashboard.html');
    
            //$paramentro['name_user'] = $_SESSION['usr']['name_user'];

            $paramentro = array();
            $conteudo = $template->render($paramentro); // ARMAZENA ESSE CONTEUDO DA HOME NUMA VARIAVEL 
            echo $conteudo; // COMANDO PARA EXIBIR O CONTEUDO DE HOME 
        }

       
    }    
?>

