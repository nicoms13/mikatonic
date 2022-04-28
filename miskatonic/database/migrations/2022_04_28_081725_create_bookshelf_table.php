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
        Schema::create('bookshelf', function (Blueprint $table) {
            $table->unsignedInteger('isbn');
            $table->unsignedBigInteger('idUsu');
        });

        Schema::table('bookshelf', function (Blueprint $table) {
            $table->foreign('isbn')->constrained()->references('isbn')->on('book')->onUpdate("cascade")->onDelete('cascade');
            $table->foreign('idUsu')->constrained()->references('idUsu')->on('user')->onUpdate("cascade")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookshelf');
    }
};
