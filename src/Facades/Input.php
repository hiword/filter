<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/21
 * Time: 15:04
 */

namespace Simon\Filter\Facades;


use Illuminate\Support\Facades\Facade;

class Input extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'input';
    }

}