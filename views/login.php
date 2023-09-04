<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="login">
            <form method="POST" action="<?php echo BASE_URL;?>home/login">
                <h1>Gerenciamento de Ordens de Serviço</h1>
                <label>
                    E-mail:</br>
                    <input type="email" name="email" id="email"/>
                </label><br/>
                
                <label>
                    Senha:</br>
                    <input type="password" name="senha" id="senha"/>
                </label><br/><br/>

                
                <label>            
                    <input type="submit" value="Entrar"/>
                </label>

            </form>
        </div>
    </div>
</body>
</html>