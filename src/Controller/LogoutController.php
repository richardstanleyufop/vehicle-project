<?php

namespace Estudo\Projeto\Controller;

class LogoutController
{

    public function __construct()
    {
    }
    public function processaRequisicao(){
        session_destroy();
        header('Location:/login');
    }
}