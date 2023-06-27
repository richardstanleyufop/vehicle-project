<?php

namespace Estudo\Projeto\Helper;

trait FlashMessageTrait
{
    private function errorMessage(string $msg):void
    {
      $_SESSION['error_message']=$msg;
    }

}