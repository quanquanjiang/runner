<?php
namespace Slince\Example;

use Slince\Runner\Runner;

class AppRunner extends Runner
{
    function initialize()
    {
        $this->getClassLoader('psr-0')->addPrefix($this->getNamespace(), './');
    }
}