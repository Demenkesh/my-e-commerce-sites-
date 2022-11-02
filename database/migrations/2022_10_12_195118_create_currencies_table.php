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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->float('exchange_rate');
            $table->string('code');
            $table->tinyinteger('trending')->default('0')->comment('1=trending,0=not-trending');
            $table->tinyinteger('off')->default('0')->comment('1=hidden,0=visible');
            $table->tinyinteger('on')->default('0')->comment('1=hidden,0=visible');
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
        Schema::dropIfExists('currencies');
    }
};
