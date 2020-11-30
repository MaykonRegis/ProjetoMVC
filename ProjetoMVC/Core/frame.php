<?php

    class Estrurura {
        private $url;
        private $controller;
        private $method = 'index'; // METODO PADRAO CASO NAO ACHA PAGINA
        private $params = array();

        private $usuario;
        private $error; // PRA MSG DE ERRO

        public function __construct(){
            //VERIFICAR SE TEM SESSÃO   
            $this->usuario = $_SESSION['usr'] ?? null; // VERIFICA SE TEM SESAO 

            //COMANDO PRA MSG DE ERROR NAO APARECER DEPOIS DE ATUALIZAR A PAGINA
            $this->error = $_SESSION['msg_error'] ?? null;

            if(isset($this->error)){
                if($this->error['count'] === 0){
                   // var_dump($this->error); // COMANDO DE TESTE
                   $_SESSION['msg_error']['count']++;
                } else {
                    unset($_SESSION['msg_error']);
                }
            }
        }

        public function start($request){
            if(isset($request['url'])){
                //var_dump($request);
                $this->url = explode('/', $request['url']); // PARA QUEBRAR E TRANFORMA NUM ARRAY
                //var_dump($this->url);

                $this->controller = ucfirst($this->url[0]).'Controller'; // PARA PEGAR SOMENTE A PRIMEIRA PAGINA OU METHODO
                array_shift($this->url);// ´PARA APAGAR A PRIMEIRA POSICAO DA VARIAVEL 

                //COMANDO PARA 
                if(isset($this->url[0]) && $this->url != ''){
                    $this->method = $this->url[0]; 
                    array_shift($this->url); // PARA APAGAR NOVAMENTE A PRIMEIRA POSICAO 

                    if(isset($this->url[0]) && $this->url != ''){
                        $this->params = $this->url; // PARA OQUE VINHER DEPOIS DAS BARRA NA URL
                    }
                }
                
                
               
            
            }else {
                $this->controller = 'HomeController';
                $this->method = 'index';
            }
            
            
            //var_dump($this->controller, $this->method, $this->params);
            return call_user_func(array(new $this->controller, $this->method), $this->params);
        }

    }


?>