<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bancos', function (Blueprint $table) {
            $table->id();
            $table->Integer('tipo_bd');
            $table->string('name', '26');
            $table->string('hostname', '50');
            $table->string('username', '50');
            $table->string('password', '50')->nullable();
            $table->string('dbname', '50');
            $table->string('descricao', '26')->nullable();
            $table->timestamps();
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('bancos');
        Schema::enableForeignKeyConstraints();
    }
}
