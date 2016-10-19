<?php

use Faker\Generator;
use App\Entities\TicketCategory;

class TicketCategoryTableSeeder extends BaseSeeder
{
    public function run()
    {
        $this->createCategories();
        $this->createMultiple(10);
    }

    public function getModel()
    {
        return new TicketCategory();
    }

    public function getDummyData(Generator $faker, array $customValues = array())
    {
        return [
            'nombre' => $faker->sentence(),
            'detalle' => $faker->text(),
            'estado' => $faker->randomElement(['Activo', 'Activo', 'Activo', 'Activo', 'Activo', 'Inactivo']),
            'ticket_priorities_id' => $this->getRandom('TicketPriority')->id,
            'parent_id' => rand(1, 4),
        ];
    }

    private function createCategories()
    {
        TicketCategory::create([
            'nombre' => 'Software de gestión',
            'detalle' => 'Programas de gestión',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 0,
        ]);
        TicketCategory::create([
            'nombre' => 'Sistema operativo',
            'detalle' => 'Problemas de windows',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 0,
        ]);
        TicketCategory::create([
            'nombre' => 'Hardware',
            'detalle' => 'Problemas con equipamiento',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 0,
        ]);
        TicketCategory::create([
            'nombre' => 'Usuarios e Internet',
            'detalle' => 'Alta, Baja y Permisos de Usuarios',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 0,
        ]);

//SubCategorias de Software de Gestión
        TicketCategory::create([
            'nombre' => 'Tango',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 1,
        ]);
        TicketCategory::create([
            'nombre' => 'BAS',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 1,
        ]);
        TicketCategory::create([
            'nombre' => 'Sistema de Caña',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 1,
        ]);
        TicketCategory::create([
            'nombre' => 'Synagro',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 1,
        ]);
        TicketCategory::create([
            'nombre' => 'Migrasueldos',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 1,
            'parent_id' => 1,
        ]);

//SubCategorias de Sistema Operativo
        TicketCategory::create([
            'nombre' => 'Windows',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 2,
            'parent_id' => 2,
        ]);
        TicketCategory::create([
            'nombre' => 'Ofimatica',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 2,
        ]);
        TicketCategory::create([
            'nombre' => 'Antivirus',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 2,
        ]);
        TicketCategory::create([
            'nombre' => 'Herramientas',
            'detalle' => 'ZIP PDF etc',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 2,
        ]);
        TicketCategory::create([
            'nombre' => 'CAD',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 2,
        ]);

//SubCategorias de Hardware
        TicketCategory::create([
            'nombre' => 'PC/Notebook',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 3,
        ]);
        TicketCategory::create([
            'nombre' => 'Notebook',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 3,
        ]);
        TicketCategory::create([
            'nombre' => 'Impresoras',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 3,
        ]);
        TicketCategory::create([
            'nombre' => 'Celulares',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 3,
        ]);
        TicketCategory::create([
            'nombre' => 'Hardware de Comunicacion',
            'detalle' => 'Radios, Videos, internos',
            'estado' => 'Activo',
            'ticket_priorities_id' => 3,
            'parent_id' => 3,
        ]);

//SubCategorias de Usuarios
        TicketCategory::create([
            'nombre' => 'Alta de Usuario',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 2,
            'parent_id' => 4,
        ]);
        TicketCategory::create([
            'nombre' => 'Baja de Usuario',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 2,
            'parent_id' => 4,
        ]);
        TicketCategory::create([
            'nombre' => 'Modificación de Usuario',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 2,
            'parent_id' => 4,
        ]);
        TicketCategory::create([
            'nombre' => 'Correo electrónico',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 2,
            'parent_id' => 4,
        ]);
        TicketCategory::create([
            'nombre' => 'Navegación Web',
            'detalle' => '',
            'estado' => 'Activo',
            'ticket_priorities_id' => 2,
            'parent_id' => 4,
        ]);
    }
}
