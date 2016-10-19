<?php

use Faker\Generator;
use App\Entities\Ticket;

class TicketTableSeeder extends BaseSeeder
{
    public function getModel()
    {
        return new Ticket();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        $faker = Faker\Factory::create('es_AR');
        return [
            'titulo'  => $faker->sentence(),
            'detalle' => $faker->text(),
            'estado'  => $faker->randomElement(['Pendiente', 'Abierto', 'Abierto', 'Abierto', 'Vencido', 'Cerrado']),
            'vencimiento' => $faker->dateTimeBetween('now', '+1 month'),
            'user_id' => $this->getRandom('User')->id,
            'ticket_priorities_id' => rand(1, 5),
            'ticket_categories_id' => $this->getRandom('TicketCategory')->id,
        ];
    }
}
