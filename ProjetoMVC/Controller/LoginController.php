<?php

    class LoginController {
        public function index(){
            //return 'Ola';
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader,);
            $template = $twig->load('login.html');

            //$paramentro['error'] = $_SESSION['msg_error'] ?? null;

            $paramentro = array();
            $conteudo = $template->render($paramentro); // ARMAZENA ESSE CONTEUDO DA HOME NUMA VARIAVEL 
            echo $conteudo; // COMANDO PARA EXIBIR O CONTEUDO DE HOME 
        }

        public function logar(){
            try{    
                $usuario = new User; // PUXANDO A CLASSE USER 
                $usuario->setEmail($_POST['email']); // SETANDO OS DADOS NECESSARIOS
                $usuario->setSenha($_POST['senha']);
                $usuario->validarLogin(); // CHAMANDO O METODO VALIDAR LOGIN
                header('Location: http://localhost/projetoMvc/Dashboard');
            }catch(\Exception $e){
                $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);  // MSG DE ERROR
                header('Location: http://localhost/projetoMvc/');
            }
        }
    }

?>