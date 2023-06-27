<?php

namespace Estudo\Projeto\Controller;

use Estudo\Projeto\Helper\FlashMessageTrait;
use Estudo\Projeto\Repository\UserRepository;

class LoginController
{
    use FlashMessageTrait;
    public function processaRequisicao(UserRepository $userRepository)
    {
        $email=filter_input(INPUT_POST,'email');
        $password=filter_input(INPUT_POST,'password');
        $user=$userRepository->findUser($email);
        if(password_verify($password,$user->password)){
            $_SESSION['Logado']=true;
            $_SESSION['email']=$user->email;
            header('Location: /');
        }else{
            header('Location: /');
            $this>$this->errorMessage('Usuário ou Senha invalidos');
        }

    }

}