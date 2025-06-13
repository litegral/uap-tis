<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa_matakuliah', function (Blueprint $table) {
            $table->string('mhsNim');
            $table->unsignedBigInteger('mkId');

            $table->foreign('mhsNim')->references('nim')->on('mahasiswas')->onDelete('cascade');
            $table->foreign('mkId')->references('id')->on('matakuliahs')->onDelete('cascade');

            $table->primary(['mhsNim', 'mkId']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_matakuliah');
    }
};
