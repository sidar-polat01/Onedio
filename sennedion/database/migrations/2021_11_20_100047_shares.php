<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Shares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('userName');
            $table->string('title');
            $table->string('slug');
            $table->longText('image')->nullable();
            $table->longText('description')->nullable();
            $table->enum('status',['publish','draft'])->default('draft');
            $table->timestamps();
            $table->foreign('category_id')
                ->references('id')
                ->on('share_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shares');
    }
}
