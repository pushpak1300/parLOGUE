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
            $table->bigIncrements('id');
            $table->bigInteger('design_no');
            $table->string('photho_path')->nullable();
            $table->string('category', 100)->nullable();
            $table->string('company', 100)->nullable();
            $table->unsignedBigInteger('sub_categories_id')->nullable();
            $table->string('base_price')->nullable()->default('500');
            $table->timestamps();
            $table->foreign('sub_categories_id')
                ->references('id')->on('sub_category')
                ->onDelete('cascade');
        
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
