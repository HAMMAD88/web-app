<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('dislikes', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('dislikeable_id');
        $table->string('dislikeable_type');
        $table->timestamps();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('dislikes');
}
};
