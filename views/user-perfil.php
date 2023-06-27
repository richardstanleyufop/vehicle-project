<?php

use Estudo\Projeto\Model\User;

require_once __DIR__ . '/inicio-html.php';
/**@var ?User $user**/

?>

<main class="container">
 <div class="profile">
  <img src="<?= '/img/uploads/'.$user?->img;?>" alt="Foto de Perfil">
  <div class="details">
   <p><?= $user?->name;?></p>
   <p><?= $user?->email;?></p>
  </div>
 </div>
 <a class="formulario__botao" href="/editar-usuario">Editar</a>


</main>

</body>

</html>
