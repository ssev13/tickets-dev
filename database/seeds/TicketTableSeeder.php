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
        return [
            'titulo'  => $faker->sentence(),
            'detalle' => $faker->text(),
            'estado'  => $faker->randomElement(['Pendiente', 'Abierto', 'Abierto', 'Abierto', 'Vencido', 'Cerrado']),
            'user_id' => $this->getRandom('User')->id,
            'ticket_categories_id' => $this->getRandom('TicketCategory')->id,
        ];
    }
}
