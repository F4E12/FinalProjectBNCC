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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoiceid');
            $table->unsignedBigInteger('userid')->nullable();
            $table->foreign("userid")->references("id")->on("users");
            $table->unsignedBigInteger('itemid')->nullable();
            $table->foreign("itemid")->references("id")->on("items");
            $table->integer('cartamount');
            $table->integer('subtotal');
            $table->integer('total');
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
        Schema::dropIfExists('invoices');
    }
};
