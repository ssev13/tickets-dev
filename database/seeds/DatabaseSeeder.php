<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->truncateTables(array(
                'users',
                'password_resets',
                'tickets',
                'ticket_categories',
                'ticket_comments',
        ));

        $this->call(UsersTableSeeder::class);
        $this->call(TicketCategoryTableSeeder::class);
        $this->call(TicketTableSeeder::class);
        $this->call(TicketCommentsTableSeeder::class);
    }

    private function truncateTables(array $tables)
    {
        $this->checkForeingKeys(false);

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        $this->checkForeingKeys(true);
    }

    private function checkForeingKeys($check)
    {
        $check = $check ? '1' : '0';

        DB::statement('SET FOREIGN_KEY_CHECKS = '.$check);
    }
}
