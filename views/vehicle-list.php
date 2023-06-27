<?php
require_once __DIR__ . '/inicio-html.php';
/**@var ?array $vehicleList**/
?>

<ul class="vehicles__container" alt="Veiculos projeto">
    <?php foreach ($vehicleList as $veiculo){ ?>
        <li class="vehicle__item">
            <img src="<?php echo $veiculo->getUrl()?>" alt="vehicle" height="250" width="200" >

            <div class="descricao-vehicle">
                <img >
                <h3><?php echo $veiculo->name()?></h3>
                <div class="acoes-vehicle">
                    <a href="/editar-veiculo?id=<?= $veiculo->id();?>">Editar</a>
                    <a href="/remover-veiculo?id=<?= $veiculo->id();?>">Excluir</a>
                </div>
            </div>
        </li>
    <?php }?>
</ul>
</body>

</html>
