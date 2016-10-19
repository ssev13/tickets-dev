<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Entities\TicketComment;

class TicketCommentsTableSeeder extends BaseSeeder
{
    protected $total=250;

    public function getModel()
    {
        return new TicketComment();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,
            'comentario' => $faker->text(),
            'responde' => 0,
            'tipo' => $faker->randomElement(['Seguimiento', 'Seguimiento', 'Seguimiento', 'Seguimiento', 'Tarea', 'Solucion']),
            'tipo_obs' => '',
        ];
    }

}
