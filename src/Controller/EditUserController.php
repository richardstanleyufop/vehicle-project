<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Model\User;
use Estudo\Projeto\Repository\UserRepository;

class EditUserController
{


    public function __construct(private UserRepository $userRepository)
    {
    }

    public function processaRequisicao()
    {
        $user = $this->userRepository->findUser($_SESSION['email']);
        $name = filter_input(INPUT_POST, 'name');
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');
        $password = password_hash($password, PASSWORD_ARGON2ID);
        $img=null;
        if($_FILES['img']['error']===UPLOAD_ERR_OK){
            $safename=uniqid('upload').'_'.pathinfo($_FILES['img']['tmp_name'],PATHINFO_BASENAME);

            move_uploaded_file($_FILES['img']['tmp_name'],__DIR__.'/../../public/img/uploads/'.$safename);
            $img=$safename;
        }
        $userEd = new User($name, $email, $password, $img);
        $userEd->setId($user->id);
        if ($this->userRepository->editUser($userEd)) {
            header('Location: /perfil?sucesso=1');
        } else {
            header('Location: /perfil?sucesso=0');
        }
    }
}