<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/21
 * Time: 14:29
 */

namespace Simon\Filter;
use Illuminate\Support\ServiceProvider;
use Simon\Filter\Drives\XssFilter;


class FilterServiceProvider extends ServiceProvider
{

    protected $defer = true;


    public function boot()
    {

    }


    public function register()
    {
        $request = $this->app['request'];

        //
        $this->app->singleton([Input::class=>'input'],function () use ($request){
            return new Input($request->all(),new XssFilter());
        });
    }

    public function provides()
    {
        return ['input'];
    }
}