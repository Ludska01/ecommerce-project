<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->integer('brand')->default(0)->nullable();
            $table->integer('category')->default(0)->nullable();
            $table->integer('product')->default(0)->nullable();
            $table->integer('slider')->default(0)->nullable();
            $table->integer('coupons')->default(0)->nullable(); 
    
            $table->integer('shipping')->default(0)->nullable(); 
            $table->integer('blog')->default(0)->nullable(); 
            $table->integer('setting')->default(0)->nullable(); 
            $table->integer('returnorder')->default(0)->nullable(); 
            $table->integer('review')->default(0)->nullable(); 
    
            $table->integer('orders')->default(0)->nullable(); 
            $table->integer('stock')->default(0)->nullable(); 
            $table->integer('reports')->default(0)->nullable(); 
            $table->integer('alluser')->default(0)->nullable(); 
            $table->integer('adminuserrole')->default(0)->nullable(); 
            $table->integer('type')->default(2)->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
