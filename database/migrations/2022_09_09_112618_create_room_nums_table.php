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
        Schema::create('room_nums', function (Blueprint $table) {
            $table->id();

            $table->foreignId('block_id')->constrained('blocks')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('apartment_id')->constrained('apartments')->onDelete('cascade')->onUpdate('cascade');

            $table->string('room_num')->nullable();
            $table->tinyInteger('room_status')->default('0')->comment('0=Not-Vacant, 1=Vacant');
            $table->tinyInteger('msg_status')->default('0')->comment('0=Not-Sent, 1=Sent, 2=Pending');
            $table->text('room_description')->nullable();
            $table->text('room_accessories')->nullable();

            $table->string('firstname')->nullable();
            $table->string('othername')->nullable();
            $table->string('surname')->nullable();
            $table->string('pow')->nullable();
            $table->string('department')->nullable();
            $table->string('photo_image')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->text('remarks')->nullable();

           $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Approved');
            $table->timestamps('date_sent')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('room_nums');
    }
};
