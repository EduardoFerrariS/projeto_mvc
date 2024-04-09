<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Link Icons Library-->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Link CSS Style-->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../style.css">
    

    <title>Login</title>
</head>

<body class="bodylogin">
        <div class="login">
            <h2>Login</h2>
            <form action="index.php?action=logar" method="post" class="">
                <label class="label-email" for="email">E-mail</label>
                <i class="bx bxs-user"></i>
                <input class="input-email" type="email" id="email" name="email" placeholder="Email"><br>

                <label class="label-password" for="password">Senha</label>
                <i class="bx bxs-key"></i>
                <input class="input-password" type="password" id="password" name="senha" placeholder="Senha"><br>

                <input class="inputSubmit" type="submit" value="Login">
                <div class="mensagem-div">
                    <?php if (!empty($mensagem)) : ?>
                        <p><?php echo $mensagem; ?></p>
                    <?php endif; ?>
                </div>
            </form>
            <p>Não tem uma conta? <a href="index.php?action=registro">Registre-se aqui</a></p>
        </div>
</body>

</html>