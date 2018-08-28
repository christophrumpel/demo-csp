<?php

namespace App;

use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Policy;

class CustomCsp extends Policy
{

    /**
     * @throws \Spatie\Csp\Exceptions\InvalidDirective
     */
    public function configure()
    {
        $this->addDirective(Directive::DEFAULT, 'self');
        $this->allowGoogleFont();
        $this->allowInlineStyle();
    }

    /**
     * @throws \Spatie\Csp\Exceptions\InvalidDirective
     */
    private function allowGoogleFont()
    {
        $this->addDirective(Directive::STYLE, 'https://fonts.gstatic.com https://fonts.googleapis.com');
        $this->addDirective(Directive::FONT, 'data: https://fonts.gstatic.com');
    }

    private function allowInlineStyle()
    {
        $this->addNonceForDirective(Directive::STYLE);
    }

}