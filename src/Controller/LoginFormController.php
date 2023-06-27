<?php

namespace Estudo\Projeto\Controller;

class LoginFormController extends HtmlController
{
    public function processaRequisicao(){
        if(array_key_exists('Logado',$_SESSION)&& $_SESSION['Logado']===true){
            header('Location:/');
            return;
        }
       echo $this->renderTemplate('Login-form.php');



    }

}