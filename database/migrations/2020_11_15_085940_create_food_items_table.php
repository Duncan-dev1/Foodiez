<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_items', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('food_name');
           // $table->foreignId('category_id')->constrained('food_categories');
           $table->unsignedBigInteger ('category_id')->default(4);
         
         $table->foreign('category_id')->references('id')->on('food_categories')->onDelete('cascade');
           $table->string('image')->nullable();
           $table->integer('price');
           $table->string('description');
           $table->string('quantity');
           $table->string('units');

           $table->timestamps();
        });
         Schema::table('food_items', function($table) {
         $table->integer('type');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_items');
        Schema::table('food_items', function($table) {
        $table->dropColumn('type');
        });
    }
}
