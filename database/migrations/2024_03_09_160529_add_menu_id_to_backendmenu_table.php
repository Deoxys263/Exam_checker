<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('backendmenu', function (Blueprint $table) {
            $table->integer('menu_id')->nullable();
            $table->integer('submenu_id')->nullable();
            $table->integer('action_permission_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('backendmenu', function (Blueprint $table) {
            //
        });
    }
};
