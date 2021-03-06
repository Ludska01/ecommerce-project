<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->bigInteger('brand_id');
            $table->bigInteger('category_id');
            $table->bigInteger('subcategory_id');
            $table->bigInteger('subsubcategory_id')->nullable();
            $table->string('product_name_en');
            $table->string('product_name_srb');
            $table->string('product_slug_en');
            $table->string('product_slug_srb');
            $table->string('product_code');
            $table->integer('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_srb');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_srb')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_srb');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_description_eng');
            $table->string('short_description_srb');
            $table->longText('long_description_eng');
            $table->longText('long_description_srb');
            $table->string('product_thumbnail');
            $table->integer('hot_deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('status')->default(0);


            $table->timestamps();
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
