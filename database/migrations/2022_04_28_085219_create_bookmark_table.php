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
            $table->unsignedInteger('isbn');
            $table->unsignedBigInteger('idUser');
            $table->integer('pageTotal');
            $table->integer('pageCurrent');
        });
        Schema::table('bookmark', function (Blueprint $table) {
            $table->foreign('isbn')->constrained()->references('isbn')->on('book')->onUpdate("cascade")->onDelete('cascade');
            $table->foreign('idUser')->constrained()->references('idUser')->on('users')->onUpdate("cascade")->onDelete('cascade');
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
