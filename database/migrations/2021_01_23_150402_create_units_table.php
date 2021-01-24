<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('unit_number');
            $table->float('total_area');
            $table->float('private_area');
            $table->float('roof_area');
            $table->boolean('has_roof')->default(false);
            $table->decimal('sale_value');
            $table->decimal('bank_appraisal_value');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('units', function (Blueprint $table) {
            $table->foreignId('enterprise_id')->constrained('enterprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units', function (Blueprint $table) {
            $table->dropForeign('enterprise_id_foreign');
        });

        Schema::dropIfExists('units');
    }
}
