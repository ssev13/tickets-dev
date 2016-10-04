<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseSeeder extends Seeder
{
    protected $total = 50;
    protected static $pool = array();

    public function run()
    {
        $this->createMultiple($this->total);
    }

    protected function createMultiple($total)
    {
        for ($i = 1; $i <= $total; ++$i) {
            $this->create();
        }
    }

    abstract public function getModel();

    abstract public function getDummyData(Generator $faker, array $customValues = array());

    protected function create(array $customValues = array())
    {
        $values = $this->getDummyData(Faker::create(), $customValues);

        $values = array_merge($values, $customValues);

        return $this->addToPool($this->getModel()->create($values));
    }

    protected function getRandom($model)
    {
        if (!$this->CollectionExist($model)) {
            throw new Exception($model.' collection no existe');
        }

        return static::$pool[$model]->random();
    }

    protected function addToPool($entity)
    {
        $reflection = new ReflectionClass($entity);
        $class = $reflection->getShortName();

        if (!$this->CollectionExist($class)) {
            static::$pool[$class] = new Collection();
        }

        static::$pool[$class]->add($entity);

        return $entity;
    }

    protected function CollectionExist($collection)
    {
        return isset(static::$pool[$collection]);
    }
}
