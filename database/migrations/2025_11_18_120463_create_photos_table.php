<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('path');
            $table->string('filename');
            $table->string('alt_text')->nullable();
            $table->text('caption')->nullable();
            $table->integer('size')->nullable(); // em bytes
            $table->string('mime_type')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            
            $table->index('post_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('photos');
    }
};