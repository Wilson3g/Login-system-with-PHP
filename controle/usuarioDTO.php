<?php
    include_once('usuarioDAO.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();
    $usuario->setNome($nome);
    $usuario->setEmail($email);
    $usuario->setSenha($senha);

    $dados = $usuario;

    $usuario->cadastrar($dados);
?>