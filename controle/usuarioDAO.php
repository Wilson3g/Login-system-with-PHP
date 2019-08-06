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

            $insert = "INSERT INTO usuario (nome,email,senha) VALUES (?,?,?)";
            $stmt = $this->pdo->prepare($insert);
            $stmt->bindValue(1, $dados->getNome());
            $stmt->bindValue(2, $dados->getEmail());
            $stmt->bindValue(3, $dados->getSenha());
            $stmt->execute();

            if(isset($stmt)){
                session_start();
                $_SESSION['msg'] = '<div class="alert alert-secondary">Cadastro efetuado com sucesso!</div>';

              header('Location: ../index.php');
            }
        }

        public function logar($dados){
            $select = "SELECT * FROM usuario WHERE email=? AND senha=?";
            $stmt = $this->pdo->prepare($select);
            $stmt->bindValue(1, $dados->getEmail());
            $stmt->bindValue(2, $dados->getSenha());
            $stmt->execute();
            $busca = $stmt->fetchALL(PDO::FETCH_ASSOC);

            // $_SESSION['logado'] = $busca['id'];

            $rst = $busca->fetch();

            echo "<pre>";
            print_r($rst);
            echo "</pre>";
        }
        
    }
?>