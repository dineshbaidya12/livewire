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
        Schema::create('random_forms', function (Blueprint $table) {
            $table->id();
            $table->string('text', 20);
            $table->string('email', 200);
            $table->text('url');
            $table->string('numberInput', 10);
            $table->string('select', 20);
            $table->string('checkbox1', 20);
            $table->string('checkbox2', 20)->nullable();
            $table->string('radio', 20);
            $table->text('file');
            $table->text('password');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('random_forms');
    }
};
