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
        Schema::table('ticket', function (Blueprint $table) {
            $table->foreign(['product_id'], 'ticket_ibfk_2')->references(['id'])->on('product')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['status_id'], 'ticket_ibfk_3')->references(['id'])->on('ticket_status')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['type_id'], 'ticket_ibfk_4')->references(['id'])->on('ticket_type')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['user_id'], 'ticket_ibfk_5')->references(['id'])->on('user')->onUpdate('set null')->onDelete('set null');
            $table->foreign(['customer_id'], 'ticket_ibfk_6')->references(['id'])->on('customer')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropForeign('ticket_ibfk_2');
            $table->dropForeign('ticket_ibfk_3');
            $table->dropForeign('ticket_ibfk_4');
            $table->dropForeign('ticket_ibfk_5');
        });
    }
};
