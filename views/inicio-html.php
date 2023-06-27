
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/estilos.css">
    <link rel="stylesheet" href="/css/estilos-form.css">
    <link rel="stylesheet" href="/css/flexbox.css">
    <link rel="stylesheet" href="/css/estilos-perfil.css">
    <title>BandoCar</title>
    <link rel="shortcut icon" href="./img/favicon.ico" type="image/x-icon">
</head>
<body>

    <header>

        <nav class="cabecalho">
            <a class="logo" href="/"></a>

            <div class="cabecalho__icones">

                <a href="/novo-veiculo" class="cabecalho__veiculos">Novo</a>
                <a href="/perfil" class="cabecalho__perfil">Perfil</a>
                <a href="/logout" class="cabecalho__sair">Sair</a>
            </div>
        </nav>

    </header>
    <?php if(isset($_SESSION['error_message'])):?>
    <div class="formulario__box__erro">
        <h2 class="formulario__titulo__erro"><?= $_SESSION['error_message']?></h2>
        <?php unset($_SESSION['error_message'])?>
    </div>
<?php endif;?>