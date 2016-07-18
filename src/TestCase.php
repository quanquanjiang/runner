<?php
/**
 * slince runner library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Runner;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

class TestCase
{
    /**
     * 测试案例的名称
     * @var string
     */
    protected $for;

    /**
     * 依赖的测试用例
     * @var array
     */
    protected $depends = [];

    /**
     * @var Client
     */
    protected $httpClient;

    /**
     * @var Response
     */
    protected $response;

    /**
     * @var Examination
     */
    protected $examination;

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @return string
     */
    public function getFor()
    {
        return $this->for;
    }

    /**
     * @param string $for
     * @return $this
     */
    public function setFor($for)
    {
        $this->for = $for;
        return $this;
    }

    /**
     * @param array $depends
     * @return $this
     */
    public function setDepends($depends)
    {
        $this->depends = $depends;
        return $this;
    }

    /**
     * @return array
     */
    public function getDepends()
    {
        return $this->depends;
    }

    protected function getResponseHeaders()
    {
        return $this->response->getHeaders();
    }
}