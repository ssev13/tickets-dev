<?php

//use Illuminate\Database\Seeder;
use App\Entities\User;
use Faker\Generator;

class UsersTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new User();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [

                'nombre'   => $faker->firstName,
                'apellido' => $faker->lastName,

                'perfil'   => $faker->randomElement(['tecnico', 'usuario', 'usuario']),
                'name'     => $faker->userName,
                'dominio'  => '',
                'locacion' => $faker->randomElement(['Predio', 'Predio', 'Leales']),

                'email'    => $faker->userName.'@budeguer.com',
                'password' => bcrypt('1234'),
        ];
    }

    private function createAdmin()
    {
        User::create([

            'nombre'   => 'Sebastian',
            'apellido' => 'Vides',

            'perfil'   => 'tecnico',
            'name'     => 'svides',
            'dominio'  => '',
            'locacion' => 'Predio',

            'email'    => 'ssev13@gmail.com',
            'password' => bcrypt('123'),

        ]);
    }

    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->createAdmin();
        $this->createMultiple(25);
    }
}
