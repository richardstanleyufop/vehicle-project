<?php

use Estudo\Projeto\Model\Vehicle;

require_once __DIR__ . '/inicio-html.php';
/** @var ?\Estudo\Projeto\Model\User $user **/
?>



<main class="container">

    <form class="container__formulario"
          enctype="multipart/form-data"

          method="post">


        <div class="formulario__campo">
            <label class="formulario__titulo">Insira seus dados </label>


        </div>



        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Nome</label>
            <input name="name"
                   value="<?= $user?->name; ?>"
                   class="campo__escrita"
                   required placeholder="Digite seu nome"
                   id='name'/>
        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Email</label>
            <input name="email"
                   type="email"
                   value="<?= $user?->email; ?>"
                   class="campo__escrita"
                   required placeholder="Neste campo, digite seu email"
                   id='email'/>
        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Password</label>
            <input name="password"
                   type="password"

                   class="campo__escrita"
                   required placeholder="Neste campo, digite sua senha"
                   id='password'/>
        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Imagem</label>
            <input name="img"
                   type="file"
                   class="campo__escrita"
                   accept="image/*"
                   id='img'/>

        </div>


        <input class="formulario__botao" type="submit" value="Enviar"/>
    </form>

</main>

</body>

</html>
