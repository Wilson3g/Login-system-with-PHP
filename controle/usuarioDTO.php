<?php
    include_once('usuarioDAO.php');

    if(isset($_POST['cadastrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $dados = $usuario;

        $usuario->cadastrar($dados);
    }else{
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = new Usuario();
        $usuario->setEmail($email);
        $usuario->setSenha($senha);

        $array = $usuario;

        $usuario->logar($array);
    }
?>