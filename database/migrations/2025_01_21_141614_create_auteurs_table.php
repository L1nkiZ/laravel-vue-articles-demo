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
        Schema::create('auteurs', function (Blueprint $table) {
            $table->id();

            $table->string('nom', 255);
            $table->string('nom_interne', 255);

            $table->timestamps();
        });

        DB::table('auteurs')->insert(
            [
                'nom' => 'Andrzej Sapkowski',
                'nom_interne' => 'andrzej_sapkowski',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auteurs');
    }
};
