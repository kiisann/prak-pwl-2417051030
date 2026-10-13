<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);
        });

        Schema::dropIfExists('user');

        Schema::create('user', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('npm');
            $table->unsignedBigInteger('kelas_id');
            $table->timestamps();

            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropForeign(['kelas_id']);
        });

        Schema::dropIfExists('user');

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('npm');
            $table->foreignId('kelas_id')->constrained();
            $table->timestamps();
        });
    }
};
