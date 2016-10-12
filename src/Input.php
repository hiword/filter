<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/21
 * Time: 13:53
 */

namespace Simon\Filter;



class Input
{
    /**
     * 数据组
     * @var array
     */
    protected $data = [];

    /**
     * Input constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * 获取所有数据
     * @return array
     */
    public function all()
    {
        return $this->data;
    }

    /**
     * 获取指定数据
     * @param $key
     * @param null $default
     * @return mixed|null
     */
    public function input($key,$default = null)
    {
        return $this->data[$key] ?? $default;
    }

    /**
     * 获取除此key之后的数据
     * @param $key
     * @return array
     */
    public function except($key)
    {
        $key = (array)$key;

        $key = array_combine($key,$key);

        return array_diff_key($this->data,$key);
    }

    /**
     * 过滤组件
     * @param FilterInterface $filter
     * @return Input
     */
    public function filter(FilterInterface $filter) : Input
    {
        $this->filterHandle($filter);

        return $this;
    }

    /**
     * instance
     * @param array $data
     * @return Input
     */
    public function instance(array $data) : Input
    {
        return new self($data);
    }

    /**
     * 过滤核心处理
     * @param FilterInterface $filter
     */
    protected function filterHandle(FilterInterface $filter)
    {
        foreach ($this->data as &$value)
        {
            if (is_array($value))
            {
                $this->filterHandle($filter);
            }
            else
            {
                $value = $filter->filter(trim($value));
            }
        }
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->input($name);
    }

}