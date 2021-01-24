<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('cep')->nullable();
            $table->string('address');
            $table->string('neighborhood');
            $table->integer('number')->nullable();
            $table->string('state_name');
            $table->string('city_name');
            $table->decimal('construction_value')->default(0);
            $table->date('begin_at')->nullable();
            $table->date('end_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('enterprises', function (Blueprint $table) {
            $table->foreignId('technical_managers_id')->constrained('technical_managers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('enterprises', function (Blueprint $table) {
            $table->dropForeign('technical_managers_id_foreign');
        });
        
        Schema::dropIfExists('enterprises');
    }
}
