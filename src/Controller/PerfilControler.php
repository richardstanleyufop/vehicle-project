<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Repository\UserRepository;

class PerfilControler extends HtmlController
{

    public function __construct(private UserRepository $userRepository){

    }
    public function processaRequisicao(){
        $user=$this->userRepository->findUser($_SESSION['email']);

        echo $this->renderTemplate('user-perfil.php',['user'=>$user]);



    }

}