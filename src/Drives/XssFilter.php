<?php
/**
 * Xss过滤
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
        // TODO: Implement filter() method.

        return $this->xssClean($var);
    }

    protected function xssClean(string $var) : string
    {
        return strip_tags($var);
    }

}