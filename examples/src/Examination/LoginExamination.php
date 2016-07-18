<?php
namespace Slince\Example\Examination;

use Slince\Runner\Examination;

class LoginExamination extends Examination
{
    const NAME = 'login';

    function initialize()
    {
        $api = self::createApi('http://app.shein.com/index.php?model=login_register_ajax&action=mobile_login')
            ->setQuery([
                'email' => 'taosikai@sina.cn',
                'password' => '123456'
            ])
            ->setEnableCookie(true);
        $this->setApi($api);
        $this->setName($name);
    }
}