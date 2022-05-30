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
        Schema::create('slider_books', function (Blueprint $table) {
            $table->unsignedInteger('isbn');
        });
        Schema::table('slider_books', function (Blueprint $table) {
            $table->foreign('isbn')->constrained()->references('isbn')->on('book')->onUpdate("cascade")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('slider_books');
    }
};
