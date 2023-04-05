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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->integer('nim')->primary();
            $table->string('nama', 50)->nullable();
            $table->string('kelas', 10)->nullable();
            $table->string('jurusan', 50)->nullable();
            $table->string('no_hp', 20)->nullable();
            // $table->string('email', 30)->nullable();
            // $table->date('tgl_lahir')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mahasiswas');
    }
};
