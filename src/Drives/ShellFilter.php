<?php
/**
 * Shell过滤
 * User: simon
 * Date: 2016/9/21
 * Time: 15:19
 */

namespace Simon\Filter\Drives;


use Simon\Filter\FilterInterface;

class ShellFilter implements FilterInterface
{

    public function filter(string $var) : string
    {
        // TODO: Implement filter() method.
        return escapeshellarg($var);
    }

}