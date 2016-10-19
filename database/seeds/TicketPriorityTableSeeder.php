<?php

use Faker\Generator;
use App\Entities\TicketPriority;

class TicketPriorityTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->createPriorities();
        $this->createMultiple(1);
    }

    public function getModel()
    {
        return new TicketPriority();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'nombre' => $faker->sentence(),
            'detalle' => $faker->text(),
            'horas' => $faker->randomElement([2,4,8,12,24,48,240,720]),
        ];
    }

    private function createPriorities()
    {
        TicketPriority::create([
            'nombre' => 'Urgente',
            'detalle' => 'Tickets sin demoras',
            'horas' => 2,
        ]);
        TicketPriority::create([
            'nombre' => 'Importante',
            'detalle' => 'Tickets de alto impacto',
            'horas' => 4,
        ]);
        TicketPriority::create([
            'nombre' => 'Normal',
            'detalle' => 'Prioridad por defecto',
            'horas' => 24,
        ]);
        TicketPriority::create([
            'nombre' => 'Baja',
            'detalle' => 'Tickets de bajo impacto',
            'horas' => 240,
        ]);
        TicketPriority::create([
            'nombre' => 'Proyecto',
            'detalle' => 'Tickets de proyectos de largo plazo',
            'horas' => 720,
        ]);
    }
}
