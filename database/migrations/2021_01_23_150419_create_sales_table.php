<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->decimal('sold_by');
            $table->decimal('total_discounts')->default(0);
            $table->integer('status');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('client_id')->constrained('clients');
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('salesman_id')->constrained('salesman');
        });

        Schema::table('sales', function (Blueprint $table) {
            $table->foreignId('unit_id')->constrained('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('client_id_foreign');
            $table->dropForeign('salesman_id_foreign');
            $table->dropForeign('unit_id_foreign');
        });

        Schema::dropIfExists('sales');
    }
}
