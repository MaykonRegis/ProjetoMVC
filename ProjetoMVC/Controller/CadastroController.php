<?php

    class CadastroController {
        public function index(){
            //return 'Ola';
            $loader = new \Twig\Loader\FilesystemLoader('view');
            $twig = new \Twig\Environment($loader,);
            $template = $twig->load('cadastro.html');
    
            //$paramentro['error'] = $_SESSION['msg_error'] ?? null;

            $paramentro = array();
            $conteudo = $template->render($paramentro); // ARMAZENA ESSE CONTEUDO DA HOME NUMA VARIAVEL 
             echo $conteudo; // COMANDO PARA EXIBIR O CONTEUDO DE HOME 
        }


        public function cadastrar(){
            try{
                $usuario = new User; // PUXANDO A CLASSE USER 
                $usuario->setnome($_POST['nome']); // SETANDO OS DADOS NECESSARIOS
                $usuario->setEmail($_POST['email']);
                $usuario->setSenha($_POST['senha']);
                $usuario->setEndereco($_POST['endereco']);
                $usuario->setCelular($_POST['celular']);
                $usuario->setCidade($_POST['cidade']);
                $usuario->setCep($_POST['cep']);
                $usuario->cadastrarAcesso(); // CHAMANDO O METODO VALIDAR LOGIN
                header('Location: http://localhost/projetoMvc/login');
            }catch(Exception $e){
                $_SESSION['msg_error'] = array('msg' => $e->getMessage(), 'count' => 0);  // MSG DE ERROR
                header('Location: http://localhost/projetoMvc/');
            }
        }
    }

?>