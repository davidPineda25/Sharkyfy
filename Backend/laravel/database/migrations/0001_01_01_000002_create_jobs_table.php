<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('role', function(Blueprint $table){
            $table->id();
            $table->string('nameRole')->unique();
        });
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('password')->unique();
            $table->string('email')->unique();
            $table->date('birthday');
            $table->string('phone');
            $table->string('imageProfile');
            $table->timestamp('createAt');
            $table->foreignId('idRole')->constrained('role')->onDelete('cascade');
        }); 
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string("nameCategory");
        });
        Schema::create('product', function(Blueprint $table){
            $table->id();
            $table->string('sku')->unique();
            $table->string('title');
            $table->string('body');
            $table->decimal('price',10,2);
            $table->string('status',30)->default('pending');;
            $table->integer('stock');
            $table->timestamp('created_at');
        });
        Schema::create('productCategory', function (Blueprint $table){
            $table->id();
            $table->foreignId('idProduct')->constrained('product')->onDelete('cascade');
            $table->foreignId('idCategory')->constrained('category')->onDelete('cascade');

            $table->unique(['idProduct','idCategory']);
        });
        Schema::create('adress', function(Blueprint $table){
            $table->id();
            $table->string('adress');
            $table->string('city');
            $table->string('country');
            $table->string('zipCode');
            $table->foreignId('idUser')->constrained('user')->onDelete('cascade');
        });
        Schema::create('order', function(Blueprint $table){
            $table->id();
            $table->timestamp('dateOrder');
            $table->string('status')->default('pending');
            $table->timestamp('cretedAt');
            $table->foreignId('idUser')->constrained('user')->onDelete('cascade');;
            $table->foreignId('idAdress')->constrained('adress')->onDelete('cascade');
        });
        Schema::create('orderDetail', function(Blueprint $table){
            $table->id();
            $table->integer('quantity');
            $table->decimal('price',10,2);
            $table->foreignId('idOrder')->constrained('order')->onDelete('cascade');;
            $table->foreignId('idProduct')->constrained('product')->onDelete('cascade');;
        });
        Schema::create('payment', function(Blueprint $table){
            $table->id();
            $table->string('codepay')->unique()->nullable();
            $table->string('method');
            $table->string('status')->default('pending');
            $table->decimal('amount',10,2);
            $table->timestamp('paid_at')->nullable();
            $table->foreignId('idOrderDetail')->constrained('orderDetail')->onDelete('cascade');
        });
        Schema::create('comments', function(Blueprint $table){
            $table->id();
            $table->string('body');
            $table->foreignId('idUser')->constrained('user')->onDelete('cascade');;
            $table->foreignId('idProduct')->constrained('product')->onDelete('cascade');;
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('payment');
        Schema::dropIfExists('orderDetail');
        Schema::dropIfExists('order');
        Schema::dropIfExists('productCategory');
        Schema::dropIfExists('product');
        Schema::dropIfExists('category');
        Schema::dropIfExists('adress');
        Schema::dropIfExists('user');
        Schema::dropIfExists('role');
    }
};
