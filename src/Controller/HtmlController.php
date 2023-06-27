<?php

namespace Estudo\Projeto\Controller;

abstract class HtmlController
{
    private const TEMPLATE_PATH=__DIR__.'/../../views/';
    protected function renderTemplate(string $templateName,array $context=[]):string
    {
        extract($context);
        ob_start();
        require_once self::TEMPLATE_PATH.$templateName;

        return ob_get_clean();

    }

}