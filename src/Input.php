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

    public function __construct(array $data,FilterInterface $filter)
    {
        $this->filter = $filter;
        $this->data = $this->clean($data);
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
        $key = array_combine($key,$key);

        return array_diff_key($this->data,$key);
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

    protected function clean(array $data)
    {
        return array_map(function($value) use ($data){
            return is_array($value) ? $this->clean($value) : $this->filter->filter($value);
        },$data);


//        foreach ($data as &$value)
//        {
//            $value = is_array($value) ? $this->clean($value) : $this->filter->filter($value);
//        }
    }

}