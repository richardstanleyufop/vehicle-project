<?php

use Estudo\Projeto\Model\Vehicle;

require_once __DIR__ . '/inicio-html.php';
/** @var ?Vehicle $vehicle **/
?>



<main class="container">

    <form class="container__formulario"

          method="post">
        <h2 class="formulario__titulo">Insira um Veículo!</h2>

        <div class="formulario__campo">



        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="url">Link imagem</label>
            <input name="url"
                   value="<?= $vehicle?->url; ?>"
                   class="campo__escrita" required
                   placeholder="Por exemplo: data:image/jpeg;base64,/" id='url'/>
        </div>


        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Nome do Veículo</label>
            <input name="nome"
                   value="<?= $vehicle?->name; ?>"
                   class="campo__escrita"
                   required placeholder="Neste campo, dê o nome do veículo"
                   id='nome'/>
        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Placa</label>
            <input name="placa"
                   value="<?= $vehicle?->plate; ?>"
                   class="campo__escrita"
                   required placeholder="Neste campo, digite a placa do veículo"
                   id='placa'/>
        </div>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="titulo">Ano</label>
            <input name="ano"
                   value="<?= $vehicle?->year; ?>"
                   class="campo__escrita"
                   required placeholder="Neste campo, digite o ano do veículo"
                   id='ano'/>
        </div>

        <input class="formulario__botao" type="submit" value="Enviar"/>
    </form>

</main>

</body>

</html>
