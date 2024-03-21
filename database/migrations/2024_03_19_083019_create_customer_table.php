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
        Schema::create('customer', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type_id')->index('customer_ibfk_1');
            $table->string('full_name', 100);
            $table->string('country', 100);
            $table->string('city', 100);
            $table->string('postal_code', 100);
            $table->string('bank_account_number', 100);
            $table->boolean('active')->default(true);
            $table->string('phone_number', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
};
