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
            Schema::dropIfExists('items');
            Schema::create('items', function (Blueprint $table) {
                $table->id();
                $table->string('item_name');
                $table->unsignedBigInteger('category');
                $table->foreign('category')->references('id')->on('categories')->onDelete('cascade');
                $table->string('desc');
                $table->integer('price');
                $table->string('photo')->nullable();
                $table->timestamps();

            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign(['category']);
        });

        Schema::dropIfExists('items');

    }
};
