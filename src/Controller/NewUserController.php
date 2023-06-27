<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Model\User;
use Estudo\Projeto\Repository\UserRepository;
use finfo;

class NewUserController
{

    public function __construct(private UserRepository $userRepository)
    {

    }
    public function processaRequisicao(){
        $name=filter_input(INPUT_POST,'name');
        $email=filter_input(INPUT_POST,'email');
        $password=filter_input(INPUT_POST,'password');
        $password=password_hash($password,PASSWORD_ARGON2ID);

        $img=null;
        if($_FILES['img']['error']===UPLOAD_ERR_OK){
            $safename=uniqid('upload').'_'.pathinfo($_FILES['img']['tmp_name'],PATHINFO_BASENAME);

                move_uploaded_file($_FILES['img']['tmp_name'],__DIR__.'/../../public/img/uploads/'.$safename);
                $img=$safename;


        }
        $user= new User($name,$email,$password,$img);

        if($this->userRepository->userRegister($user)){
            header('Location: /Login?sucesso=1');
        }else{
            header('Location: /Login?sucesso=0');
        }
    }
}