<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('group_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('body_html')->nullable();
            $table->json('body_delta')->nullable();
            $table->boolean('is_public')->default(false);

            $table->foreignId('last_edited_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
            
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('formations');
    }
};
