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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();

            // Basic info
            $table->string('name');
            $table->string('slug')->unique()->comment('SEO-friendly URL slug');
            $table->string('subdomain')->unique()->comment('subdomain.schoolpage.co.ke');

            // Location
            $table->foreignId('county_id')->constrained()->cascadeOnDelete()->index();
            $table->foreignId('subcounty_id')->constrained()->cascadeOnDelete()->index();
            $table->foreignId('ward_id')->constrained()->cascadeOnDelete()->index();
            $table->decimal('latitude', 10, 7)->nullable()->comment('School GPS latitude');
            $table->decimal('longitude', 10, 7)->nullable()->comment('School GPS longitude');

            // Contact info
            $table->string('address')->nullable()->comment('Full postal address including town/city and postal code');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->string('principal_name')->nullable();

            // Attributes
            $table->enum('category', ['senior secondary', 'comprehensive'])->default('comprehensive');
            $table->enum('type', ['public', 'private'])->default('public');
            $table->enum('gender', ['male', 'female', 'mixed'])->default('mixed');

            // Optional description
            $table->text('description')->nullable();

            // Timestamps and soft deletes
            $table->timestamps();
            $table->softDeletes();

            // Indexes for search optimization
            $table->index(['county_id', 'subcounty_id', 'ward_id']);
            $table->index(['name', 'slug', 'subdomain']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
