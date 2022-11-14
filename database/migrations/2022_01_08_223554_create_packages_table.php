<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id('p_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image');
            $table->float('price_1');
            $table->float('price_2')->nullable();
            $table->float('price_3')->nullable();
            $table->unsignedTinyInteger('night')->nullable();
            $table->unsignedTinyInteger('room_person')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
