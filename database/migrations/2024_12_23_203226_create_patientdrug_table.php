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
        Schema::create('patientdrug', function (Blueprint $table) {
            $table->foreignId('pat_id');
            $table->foreignId('drug_id');
            $table->foreign('pat_id')->references('id')->on('patients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patientdrug');
    }
};
