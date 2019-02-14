<?php

namespace App;

use App\Interfaces\ModelInterface;

class Model implements ModelInterface
{

    protected
        $tableName,
        $tablePrefix
    ;


    protected $errorMessages = [
        'no_model_name' => 'No Model Class Provided',
        'unable_to_load' => 'Unable to load Model'
    ];


    public $pdo;


    public function __construct()
    {
        $this->tablePrefix = getenv('TABLE_PREFIX');

        $this->setTableName();
        $this->setPDO(Boot::getGlobal('pdo'));

    }



    public function setAttributes($arr)
    {
        if (!empty($arr) && sizeof($arr) > 0) {
            foreach ($arr as $item => $value) {
                $this->$item = $value;
            }

            return true;
        }

        return false;
    }



    public function setAttribute($name, $value) {
        if (!empty($name)) {
            $this->$name = $value;

            return true;
        }

        return false;
    }



    protected function loadModel($model, $arguments = null)
    {
        try {
            if (empty($model))
                throw new \Exception($this->errorMessages['no_model_name']);

            $newModel = new $model($arguments);

            if (!$newModel)
                throw new \Exception($this->errorMessages['unable_to_load']);

            $modelClassNamespace  = explode(
                '\\',
                get_class($newModel)
            );

            $modelClassName = sizeof($modelClassNamespace) > 0 ?
                lcfirst(
                    $modelClassNamespace[count($modelClassNamespace) - 1]
                ) :
                $modelClassNamespace
            ;

            $this->$modelClassName = $newModel;

        } catch (\Exception $exception) {
            die($exception->getMessage());
        }

    }



    private function setPDO($pdo)
    {
        $this->pdo = $pdo;
    }



    private function setTableName()
    {
        $classNamespace = get_called_class();

        $classPath = explode('\\', $classNamespace);
        $className = $classPath[count($classPath) - 1];

        $pieces = Utility::splitByUpperCase($className);

        $table = '';
        if (sizeof($pieces) > 1) {
            foreach ($pieces as $piece) {
                $table .= !empty($piece) ? strtolower($piece) . '_' : '';
            }
        }

        $this->tableName = !empty($this->tablePrefix) ?
            $this->tablePrefix . rtrim($table, '_') :
            rtrim($table, '_');
    }


}