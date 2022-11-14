<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attenders', function (Blueprint $table) {
            $table->id('a_id');
            $table->timestamps();
            $table->string('name');
            $table->string('surname');
            $table->string('mobile');
            $table->string('club');
            $table->string('position')->nullable();
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('room_id')->nullable(); // Oda kaydı yapınca oda id tanımlanacak.
            $table->string('reference')->nullable();
            $table->string('identity');
            $table->string('type')->nullable(); // Ne olduğu belirsiz?
            $table->float('price')->nullable(); // Oda tutarı
            $table->string('receipt_1')->nullable();
            $table->float('paid_1_amount')->nullable(); // Ön ödeme
            $table->dateTime('paid_1_date')->nullable();
            $table->string('receipt_2')->nullable();
            $table->float('paid_2_amount')->nullable(); // Kalan ödeme
            $table->dateTime('paid_2_date')->nullable();
            $table->string('status'); // Durum admin..
            $table->softDeletes();
        });


        Schema::table('attenders', function (Blueprint $table) {
            $table->foreign('package_id')->references('p_id')->on('packages')->onDelete('cascade');
            $table->foreign('user_id')->references('u_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attenders');
    }
}
