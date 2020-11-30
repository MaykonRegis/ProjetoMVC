<?php

    use Database\Connection;

    class User{
        private $id;
        private $nome;
        private $email;
        private $senha;
        private $endereco;
        private $celular;
        private $cidade;
        private $cep;

        public function validarLogin(){
            $conn = Connection::getConn();//RESPONSAVEL PELA CONEXAO DO BANCO E VALIDAR 
            //var_dump($conn); // TESTE

            $sql = 'SELECT * FROM user WHERE email = :email';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':email', $this->email);
            $stmt->execute();

            if($stmt->rowCount()){
                $result = $stmt->fetch();

                if($result['senha'] === $this->senha){
                    $_SESSION['usr'] = array('id_user' => $result['id'], 'name_user' => $result['nome']);

                    return true;
                }
            }

            throw new \Exception('Login Invalido'); // CASO O LOGIN NAO ESTEJA CERTO
        }

        public function cadastrarAcesso(){
            $conn = Connection::getConn();//RESPONSAVEL PELA CONEXAO DO BANCO E VALIDAR 

            $botao = filter_input(INPUT_POST, 'cadastro', FILTER_SANITIZE_STRING);
            if($botao){
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
                $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
                $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
                $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
                $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING);
        
                $inserir = "INSERT INTO cadpessoa (nome, email, senha, endereco, celular, cidade, cep) VALUES (:n, :e, :s, :en, :ce, :ci, :cep,)";
        
                $cad = $pdo->prepare($inserir);
                $cad->bindValue(':n', $nome);
                $cad->bindValue(':e', $email);
                $cad->bindValue(':s', $senha);
                $cad->bindValue(':en', $endereco);
                $cad->bindValue(':ce', $celular);
                $cad->bindValue(':ci', $cidade);
                $cad->bindValue(':cep', $cep);
                $res = $cad->execute();
                var_dump($res);


                if($res == 0){
                    throw new Exception("FALHA AO INSERIR OS DADOS");
                    return false;
                }   

                return true;
            }
        }


        public function getNome(){
            return $this->nome;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }

        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }

        public function getSenha(){
            return $this->senha;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getEndereco(){
            return $this->endereco;
        }
        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

        public function getCelular(){
            return $this->celular;
        }
        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getCidade(){
            return $this->cidade;
        }
        public function setCidade($cidade){
            $this->cidade = $cidade;
        }

        public function getCep(){
            return $this->cep;
        }
        public function setCep($cep){
            $this->cep = $cep;
        }

    }

?>