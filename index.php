<?php
include('conexao.php');

if(isset($_POST['email']) and isset($_POST['senha'])){
    if(strlen($_POST['email']) == 0){
        echo "Preencha seu endereço de email!";
    }else if(strlen($_POST['senha']) == 0){
        echo "Preencha sua senha!";
    }else{
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);
        
        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução!");

        $qnt = $sql_query->num_rows;
        if($qnt == 1) {
            $usuario = $sql_query->fetch_assoc();

            if(!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['user']
        }else {
            echo "Email ou Senha Incorreos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-Edge">
    <meta name="viewport" content="width-device-widht, intial-scale=1.0">
    <link rel="stylesheet" href="CSS/login.css">
    <title>Inicio | Login </title>
</head>

<body>
    <div class="main-login">
        <div class="left-login">
            <img src="CSS/login-animation.svg" class="left-login-image" alt="Login">
        </div>
        <div class="right-login">
            <div class="card-login">
                <h1> LOGIN</h1>
                <!-- USUARIO -->
                <div class="textfield">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="usuario" placeholder="usuário">
                </div>
                <!-- SENHA -->
                <div class="textfield">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" placeholder="senha">
                </div>
                <button class="btn-login">Logar</button>
            </div>
        </div>
    </div>
</body>

</html>