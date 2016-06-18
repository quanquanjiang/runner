<?php
/**
 * slince runner library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Runner;

use Webmozart\Assert\Assert;

class Examination
{
    /**
     * 测试结果，成功
     * @var string
     */
    const STATUS_SUCCESS = 'success';

    /**
     * 测试结果，失败
     * @var string
     */
    const STATUS_FAILED = 'failed';

    /**
     * 测试结果，中断
     * @var string
     */
    const STATUS_INTERRUPT = 'interrupt';

    /**
     * 测试结果，等待执行
     * @var string
     */
    const STATUS_WAITING = 'waiting';

    /**
     * 测试id
     * @var string
     */
    protected $id;

    /**
     * @var Api
     */
    protected $api;

    /**
     * @var array
     */
    protected $assertions = [];

    /**
     * @var Report
     */
    protected $report;

    /**
     * 当前测试状态
     * @var string
     */
    protected $status = self::STATUS_WAITING;

    function __construct(Api $api)
    {
        $this->api = $api;
        $this->report = new Report();
    }

    /**
     * @return Api
     */
    public function getApi()
    {
        return $this->api;
    }

    /**
     * @return Report
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * 获取所有的断言
     * @return array
     */
    public function getAssertions()
    {
        return $this->assertions;
    }

    public function setAssertions(array $assertions)
    {
        $this->assertions = $assertions;
    }

    /**
     * 添加一个断言
     * @param Assertion $assertion
     */
    function addAssertion(Assertion $assertion)
    {
        $this->assertions[] = $assertion;
    }
    /**
     * 测试执行完毕
     * @param $status
     */
    function executed($status)
    {
        $this->status = $status;
    }

    /**
     * 获取测试任务状态
     * @return string
     */
    function getStatus()
    {
        return $this->status;
    }

    /**
     * 当前测试任务是否执行完毕
     * @return bool
     */
    function getIsExecuted()
    {
        return $this->status != self::STATUS_WAITING;
    }
}