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
        Schema::create('ticket', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('type_id')->index('type_id');
            $table->integer('status_id')->index('status_id');
            $table->integer('product_id')->index('product_id');
            $table->integer('customer_id')->nullable()->index('customer_id');
            $table->integer('user_id')->nullable()->index('user_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->text('description')->nullable();
            $table->text('actions')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
};
