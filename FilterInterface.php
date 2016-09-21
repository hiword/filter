<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/21
 * Time: 13:58
 */

namespace Simon\Filter;


interface FilterInterface
{

    public function filter(string $var) : string;

}