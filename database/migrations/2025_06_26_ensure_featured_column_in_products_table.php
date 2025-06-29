<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'featured')) {
                $table->boolean('featured')->default(0)->after('tags');
            } else {
                $table->boolean('featured')->default(0)->change();
            }
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumn('products', 'featured')) {
                $table->dropColumn('featured');
            }
        });
    }
};
