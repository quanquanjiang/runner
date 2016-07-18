<?php
/**
 * slince runner library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Runner;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Slince\Cache\ArrayCache;
use Slince\Runner\Exception\InvalidArgumentException;

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
     * @var Runner
     */
    protected $runner;

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    function __construct(Runner $runner)
    {
        $this->runner = $runner;
        $this->initialize();
        if (!empty($this->for)) {
            $examination = $this->runner->getExaminationChain()->get($this->for);
            if (!is_null($examination)) {
                $examination->addTestCase($this);
            } else {
                throw new InvalidArgumentException(sprintf("Runner Cannot find Examination [%s]", $this->for));
            }
        } else {
            throw new InvalidArgumentException(sprintf("Please tell runner what's examination [%s] for", get_class($this)));
        }
    }

    function initialize()
    {
    }

    /**
     * @param Runner $runner
     */
    public function setRunner(Runner $runner)
    {
        $this->runner = $runner;
    }

    /**
     * @return Runner
     */
    public function getRunner()
    {
        return $this->runner;
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

    /**
     * @return ArrayCache
     */
    protected function getEnvironmentArguments()
    {
        return $this->runner->getArguments();
    }
}