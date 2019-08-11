<?php
    include_once('conexao.php');

    class Usuario{
        private $nome;
        private $email;
        private $senha;
        private $pdo;

        public function __construct(){
            $this->pdo = Conexao::getConnection();
        }

        public function setNome($nome){
            $this->nome = $nome;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function setSenha($senha){
            $this->senha = $senha;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getSenha(){
            return $this->senha;
        }

        public function cadastrar($dados){

            $select = "SELECT * FROM usuario WHERE email = ?";
            $query = $this->pdo->prepare($select);
            $query->bindValue(1, $dados->getEmail());
            $query->execute();

            $rst = $query->fetch();
            $email = $rst['email'];

            if(isset($query)){
                if($email == $dados->getEmail()){
                    session_start();
                    $_SESSION['msg_email'] = '<div class="alert alert-secondary">Email já existe</div>';

                    header('Location: ../login.php');
                }else{
                    $insert = "INSERT INTO usuario (nome,email,senha) VALUES (?,?,?)";
                    $stmt = $this->pdo->prepare($insert);
                    $stmt->bindValue(1, $dados->getNome());
                    $stmt->bindValue(2, $dados->getEmail());
                    $stmt->bindValue(3, $dados->getSenha());
                    $stmt->execute();

                    session_start();
                    $_SESSION['msg'] = '<div class="alert alert-secondary">Cadastro efetuado com sucesso!</div>';

                    header('Location: ../index.php');
                }
            }
        }

        public function logar($dados){
            $select = "SELECT * FROM usuario WHERE email=? AND senha=?";
            $stmt = $this->pdo->prepare($select);
            $stmt->bindValue(1, $dados->getEmail());
            $stmt->bindValue(2, $dados->getSenha());
            $stmt->execute();

            $rst = $stmt->fetch();

            if($stmt->rowCount() === 0){
                session_start();
                $_SESSION['msg_user'] = '<div class="alert alert-secondary">Usuário não existe</div>'; 
                header('Location: ../index.php');
            }else{
                session_start();
                $_SESSION['logado'] = $rst['id'];
                $_SESSION['nome'] = $rst['nome'];

                header('Location: ../inicio.php');
            }
        }
        
    }
?>