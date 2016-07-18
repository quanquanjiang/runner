<?php
namespace Slince\Example\TestCase;

use Slince\Runner\TestCase;
use Webmozart\Assert\Assert;

class LoginTestCase extends TestCase
{
    function initialize()
    {
        $this->setFor('login');
    }

    function preRequest()
    {
        $this->getEnvironmentArguments()->set('loginTime', time());
    }

    function afterRequest()
    {
        Assert::eq($this->getResponse()->getStatusCode(), 200);
        $response = json_decode($this->getResponse()->getBody());
        Assert::notEmpty($response);
        Assert::eq($response->code, 0);
    }
}