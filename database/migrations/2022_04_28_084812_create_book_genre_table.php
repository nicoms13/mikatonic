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
        Schema::create('book_genre', function (Blueprint $table) {
            $table->unsignedInteger('isbn');
            $table->unsignedInteger('idGen');
        });
        Schema::table('book_genre', function (Blueprint $table) {
            $table->foreign('isbn')->references('isbn')->on('book')->onUpdate("cascade")->onDelete('cascade');
            $table->foreign('idGen')->references('idGen')->on('genre')->onUpdate("cascade")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
    }
};
