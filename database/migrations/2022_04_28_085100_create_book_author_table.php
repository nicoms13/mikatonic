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
        Schema::create('book_author', function (Blueprint $table) {
            $table->unsignedInteger('isbn');
            $table->unsignedInteger('idAut');
        });
        Schema::table('book_author', function (Blueprint $table) {
            $table->foreign('isbn')->references('isbn')->on('book')->onUpdate("cascade")->onDelete('cascade');
            $table->foreign('idAut')->references('idAut')->on('author')->onUpdate("cascade")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_author');
    }
};
