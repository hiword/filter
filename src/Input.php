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
    protected $data = [];

    protected $filter = null;

    public function __construct(array $data,FilterInterface $filter = null)
    {
        $this->data = $data;

        if ($filter) $this->bind($filter);
    }

    public function all()
    {
        return $this->data;
    }

    public function input($key,$default = null)
    {
        return $this->data[$key] ?? $default;
    }

    public function except($key)
    {
        $key = (array)$key;

        $key = array_combine($key,$key);

        return array_diff_key($this->data,$key);
    }

    public function bind(FilterInterface $filter) : Input
    {
        $this->filter = $filter;

        $this->filter();

        return $this;
    }

    public function instance(array $data,FilterInterface $filter = null)
    {
        return new self($data,$filter);
    }

    protected function filter()
    {
        $this->data = array_map(function($value) {
            $value = trim($value);
            return is_array($value) ? $this->filter($value) : $this->filter->filter($value);
        },$this->data);
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        return $this->input($name);
    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
        return $this->input($name);
    }

}