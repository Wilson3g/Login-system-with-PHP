<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/estilo.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body onload="carregou()">

        <img id="foto" src="img/bg1.jpg" alt="">

        <div class="login-box">
            <h1>Login</h1>

            <form action="controle/usuarioDTO.php" method="post">
                <div class="textbox">
                    <label for="">Email</label>
                    <input type="text" name="email" value="">
                </div>

                <div class="textbox">
                    <label for="">Senha</label>
                    <input type="password" name="senha" value="">
                </div>

                <input class="btn btn-danger" type="submit" name="logar" value="Cadastrar">
                <a href="index.php">Não é cadastrado?</a>

                <?php
                    session_start();
                    if(isset($_SESSION['msg_email'])){
                        echo $_SESSION['msg_email'];
                        unset($_SESSION['msg_email']);
                    }
                ?>

            </div>

        </form>

        <script>
            function carregou(){
                var agora = new Date()
                var hora = agora.getHours()
                var foto = document.getElementById('foto')

                if(hora > 0 && hora <= 12){
                    foto.src = "img/bg1.jpg"
                }else if(hora > 12 && hora <= 18){
                    foto.src = "img/bg2.jpg"
                }else{
                    foto.src = "img/bg3.jpg"
                }
            }
        </script>
    </body>
</html>