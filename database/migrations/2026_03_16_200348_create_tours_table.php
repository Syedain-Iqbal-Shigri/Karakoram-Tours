<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('sku')->unique()->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            
            $table->string('destination')->nullable();
            $table->string('region')->nullable();
            $table->string('country')->default('Pakistan');
            
            $table->unsignedInteger('duration_days')->default(1);
            $table->unsignedInteger('duration_nights')->default(0);
            $table->enum('difficulty', ['easy', 'moderate', 'challenging', 'strenuous'])->default('moderate');
            
            $table->unsignedInteger('max_group_size')->default(12);
            $table->unsignedInteger('min_group_size')->default(1);
            
            $table->json('highlights')->nullable();
            $table->json('includes')->nullable();
            $table->json('excludes')->nullable();
            $table->json('requirements')->nullable();
            
            $table->string('currency', 3)->default('USD');
            $table->decimal('base_price', 10, 2)->default(0);
            $table->decimal('sale_price', 10, 2)->nullable();
            
            $table->json('available_months')->nullable();
            
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_popular')->default(false);
            $table->timestamp('published_at')->nullable();
            
            $table->decimal('rating_average', 3, 2)->default(0);
            $table->unsignedInteger('reviews_count')->default(0);
            
            $table->softDeletes();
            $table->timestamps();
            
            $table->index(['status', 'published_at']);
            $table->index(['is_featured', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};