<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('md5', 'md5')
        );
    }
}
