<?php

namespace App\Repositories;


abstract class Repository
{
    protected static $model;
    protected static $instance;

    /**
     * @param $method
     * @param $attr
     * @return mixed
     */
    public function __call($method, $attr)
    {
        return call_user_func_array([static::$model, $method], $attr);
    }

    /**
     * @param $method
     * @param $attr
     * @return mixed
     */
    public static function __callStatic($method, $attr)
    {
        self::getModel();
        return call_user_func_array([static::$model, $method], $attr);
    }

    /**
     * @param $model
     */
    protected function setModel($model)
    {
        static::$model = $model;
    }

    /**
     * @return mixed
     */
    public static function getModel()
    {
        if (!static::$model) {
            $service = get_called_class();
            $model = (new $service)->getModel();
            static::$model = $model;
        }
        return static::$model;
    }
}