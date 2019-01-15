<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTangshisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tangshis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->default('')->unique();
            $table->string('detail_url', 200)->default('');
            $table->string('tag')->default('');
            $table->text('detail')->nullable();
            $table->string('seo_url', 200);
            $table->timestamps();
            $table->unique('seo_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tangshis');
    }
}
