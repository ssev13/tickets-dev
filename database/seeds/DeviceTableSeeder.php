<?php

use Faker\Generator;
use App\Entities\Device;

class DeviceTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Device();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        $faker = Faker\Factory::create('es_AR');
        return [
            'nombre'  => $faker->sentence(),
            'detalle' => $faker->text(),
            'ip_address'  => $faker->word(),
            'mac_address' => $faker->word()
        ];
    }
}
