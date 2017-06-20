<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();;
            $table->string('name');
            $table->string('email_address')->nullable();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('postal_code');
            $table->string('phone_number_1');
            $table->string('phone_number_1_type');
            $table->string('phone_number_2')->nullable();
            $table->string('phone_number_2_type')->nullable();;
            $table->string('phone_number_3')->nullable();
            $table->string('phone_number_3_type')->nullable();;
            $table->string('contact_type');
            $table->string('contact_type_additional_info')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('contacts');
    }
}
