<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {            
            $table->integer('id')->primary();
            
            $table->string('name');
            $table->string('height'); // @dev currently stored as string due to api returning non numeric values for some entries.
            $table->string('mass'); // @dev currently stored as string due to api returning non numeric values for some entries.

            $table->string('hair_color');
            $table->string('skin_color');
            $table->string('eye_color');

            $table->string('birth_year');
            $table->string('gender');
            $table->string('homeworld');

            $table->json('films');
            $table->json('species');
            $table->json('vehicles');
            $table->json('starships');
            
            $table->string('created');
            $table->string('edited');
            $table->string('url');

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
};
