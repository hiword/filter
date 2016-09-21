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

    protected $configPath = __DIR__.'/../config/filter.php';

    public function boot()
    {
        $this->publishes([
            $this->configPath => config_path('filter.php'),
        ]);
    }


    public function register()
    {
        //合并filter config
        $this->mergeConfigFrom($this->configPath, 'filter');


        $drives = $this->app['config']->get('filter.drives');
        $data = $this->app['request']->all();

        //
        $this->app->singleton([Input::class=>'input'],function () use ($drives,$data){

            $input = new Input($data);

            array_map(function ($value) use ($input){
                $input->filter(new $value);
            },$drives);

            return $input;
        });
    }

    public function provides()
    {
        return ['input'];
    }
}