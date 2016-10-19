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
        $faker = Faker\Factory::create('es_AR');
        return [

                'nombre'   => $faker->firstName,
                'apellido' => $faker->lastName,

                'perfil'   => 'usuario',
                'name'     => $faker->userName,
                'dominio'  => '',
                'locacion' => $faker->randomElement(['Predio', 'Predio', 'Leales']),

                'email'    => $faker->userName.'@budeguer.com',
                'password' => bcrypt('123'),
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

        User::create([

            'nombre'   => 'Marcelo',
            'apellido' => 'Dulci',

            'perfil'   => 'tecnico',
            'name'     => 'mdulci',
            'dominio'  => '',
            'locacion' => 'Predio',

            'email'    => 'mdulci@budeguer.com',
            'password' => bcrypt('123'),

        ]);

        User::create([

            'nombre'   => 'Martin',
            'apellido' => 'Corbalan',

            'perfil'   => 'tecnico',
            'name'     => 'mcorbalan',
            'dominio'  => '',
            'locacion' => 'Predio',

            'email'    => 'mcorbalan@budeguer.com',
            'password' => bcrypt('123'),

        ]);

        User::create([

            'nombre'   => 'Aldo',
            'apellido' => 'Pacheco',

            'perfil'   => 'tecnico',
            'name'     => 'apacheco',
            'dominio'  => '',
            'locacion' => 'Leales',

            'email'    => 'apacheco@budeguer.com',
            'password' => bcrypt('123'),

        ]);

        User::create([

            'nombre'   => 'Gustavo',
            'apellido' => 'Rivadeneira',

            'perfil'   => 'externo',
            'name'     => 'grivadeneira',
            'dominio'  => '',
            'locacion' => 'Externo',

            'email'    => 'grivadeneira@hotmail.com',
            'password' => bcrypt('123'),

        ]);

        User::create([

            'nombre'   => 'Soporte',
            'apellido' => 'Synagro',

            'perfil'   => 'externo',
            'name'     => 'synagro',
            'dominio'  => '',
            'locacion' => 'Externo',

            'email'    => 'soporte@synagro.com',
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
