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
        // dd(Schema::hasColumn('personal_access_tokens', 'name'));

        // Schema::rename('users', 'users_renamed');

        // Schema::connection('sqlite')->create('users', function (Blueprint $table) {
        //     $table->id();
        // });

        // Schema::create('test', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('test');
        // Schema::rename('users_renamed', 'users');
    }
};
