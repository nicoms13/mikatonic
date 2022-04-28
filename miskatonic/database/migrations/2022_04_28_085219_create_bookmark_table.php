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
        Schema::create('bookmark', function (Blueprint $table) {
            $table->increments('idMark');
            $table->unsignedInteger('isbn');
            $table->unsignedBigInteger('idUsu');
            $table->integer('pageTotal');
            $table->integer('pageCurrent');
        });
        Schema::table('bookmark', function (Blueprint $table) {
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
        Schema::dropIfExists('bookmark');
    }
};
