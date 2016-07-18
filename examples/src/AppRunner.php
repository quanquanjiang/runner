<?php
namespace Slince\Example;

use Slince\Runner\Runner;

class AppRunner extends Runner
{
    function initialize()
    {
        $this->getClassLoader('psr-4')->addPrefix($this->getNamespace() . '\\', __DIR__);
    }
}