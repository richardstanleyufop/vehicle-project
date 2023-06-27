<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Repository\UserRepository;

class UserFormController extends HtmlController
{
    public function __construct(private UserRepository $userRepository){

    }
    public function processaRequisicao(){
        if(array_key_exists('email',$_SESSION)){
            $user=$this->userRepository->findUser($_SESSION['email']);
        }else{
            $user=null;
        }
        echo $this->renderTemplate('user-form.php',['user'=>$user]);
    }

}