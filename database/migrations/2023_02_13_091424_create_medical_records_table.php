<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_records', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);
            $table->enum('penyakit_jantung', ['ya', 'tidak']);
            $table->enum('haemophilia', ['ya', 'tidak']);
            $table->string('penyakit_lain')->nullable();
            $table->string('alergi_obat')->nullable();
            $table->string('alergi_makanan')->nullable();
            $table->string('tekanan_darah');
            $table->enum('diabetes', ['ya', 'tidak']);
            $table->enum('hepatitis', ['ya', 'tidak']);
            $table->text('gigi')->nullable();
            $table->longText('anamnesa')->nullable();
            $table->longText('diagnosa')->nullable();
            $table->longText('tindakan')->nullable();
            $table->foreignId('patien_id')->constrained('patiens')->onDelete('cascade');
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
        Schema::dropIfExists('medical_records');
    }
}
