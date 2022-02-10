<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 30);
            $table->string('extracto', 60);
            $table->string('contenido', 100);
            $table->enum('acceso', ['publico', 'privado']);
            $table->json('caducable_comentable');
            $table->date('fecha');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->timestamps();
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onUpdate('set null')->onDelete('set null');/**/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
