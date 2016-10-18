<?php

use Illuminate\Database\Seeder;
use Faker\Generator;
use App\Entities\TicketUser;

class TicketUserTableSeeder extends BaseSeeder
{
    protected $total=250;

    public function getModel()
    {
        return new TicketUser();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'user_id' => $this->getRandom('User')->id,
            'ticket_id' => $this->getRandom('Ticket')->id,
        ];
    }
}
