<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/21
 * Time: 13:59
 */

namespace Simon\Filter\Drives;

use Simon\Filter\FilterInterface;

class XssFilter implements FilterInterface
{
    protected $config = null;

    public function __construct($config = null)
    {
        $this->config = $config;
    }

    public function filter(string $var) : string
    {
        return $var;
        // TODO: Implement filter() method.
//        return clean($var,$this->config);
    }

}