<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::table('migrations')->insert([
            'migration' => '2023_11_20_rename_catagories_table',
            'batch' => 1,
        ]);
    }

    public function down()
    {
        DB::table('migrations')->where('migration', '2023_11_20_rename_catagories_table')->delete();
    }
};
