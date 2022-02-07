<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('description', 200);
            $table->string('photo');
            $table->string('trademark_name', 30);
            $table->string('trademark_email');
            $table->date('date_expiry');
            $table->enum('type_stock', ['sanitario', 'no_sanitario', 'alimentario']);
            $table->json('type');
            $table->integer('available_stock');
            $table->integer('minimum_stock');
            $table->unsignedBigInteger('id_user');
            $table->enum('type_product_unit', ['kilogramos', 'hectogramos', 'decagramos', 'gramos', 'decigramos', 'centigramos', 'miligramos', 'kilolitros', 'hectolitros', 'decalitros', 'litros', 'decilitros', 'centilitros', 'mililitros', 'unidades']);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('products', function (Blueprint $table) {
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
        Schema::dropIfExists('products');
    }
}
