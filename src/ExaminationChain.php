<?php
/**
 * slince runner library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Runner;

class ExaminationChain implements \IteratorAggregate
{
    /**
     * 测试项
     * @var array
     */
    protected $examinations = [];

    /**
     * 批量加入
     * @param array $examinations
     */
    function addAll(array $examinations)
    {
        foreach ($examinations as $examination) {
            $this->push($examination);
        }
    }

    /**
     * 入队
     * @param Examination $examination
     */
    function push(Examination $examination)
    {
        $this->examinations[$examination->getName()] = $examination;
    }

    /**
     * 出队
     * @return mixed
     */
    function shift()
    {
        return array_shift($this->examinations);
    }

    /**
     * 接口方法
     * @return \ArrayIterator
     */
    function getIterator()
    {
        return new \ArrayIterator($this->examinations);
    }

    /**
     * 寻找examination
     * @param $name
     * @return Examination|null
     */
    function get($name)
    {
        return isset($this->examinations[$name]) ? $this->examinations[$name] : null;
    }
}
