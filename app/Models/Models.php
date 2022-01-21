<?php

namespace App\Models;

use CodeIgniter\Exceptions\ModelException;
use CodeIgniter\Model;
use ReflectionClass;
use ReflectionException;

/**
 * Class Models
 * @property Users $users
 */
class Models extends Model
{
    /**
     * @var array
     */
    private $components = [];

    /**
     * @param $name
     * @return mixed
     */
    final public function __get($name)
    {
        if (!isset($this->components[$name]))
            $this->components[$name] =  self::getModel($name);
        return $this->components[$name];
    }

    /**
     * @param $modelName
     * @return object
     */
    private function getModel($modelName)
    {
        $className = "App\\Models\\" . ucfirst($modelName);
        if (class_exists($className)) {
            try {
                $refClass = new ReflectionClass($className);
                return $refClass->newInstanceArgs();

            } catch (ReflectionException $ex) {
                throw new ModelException('error', "DB $modelName not found");
            }
        } else {
            throw new ModelException( "DB $modelName not found", 0);
        }
    }
}