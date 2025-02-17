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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('detail');
            $table->string('photo');
            $table->string('price');
            $table->string('category');
            $table->unsignedBigInteger('user_id');
           
            $table->foreign('user_id')->references('id')->on('users');//make relationship
            $table->timestamps();
        });
    }
 
    public function down()
    {
        Schema::dropIfExists('products');
    }
};