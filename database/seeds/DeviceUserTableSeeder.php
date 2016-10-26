<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Entities\DeviceUser;

class DeviceUserTableSeeder extends BaseSeeder
{


    public function getModel()
    {
        return new DeviceUser();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'device_id' => $this->getRandom('Device')->id,
            'user_id' => $this->getRandom('User')->id,
        ];
    }
}
