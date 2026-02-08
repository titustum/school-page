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

            // Identity
            $table->string('name');
            $table->string('slug')->unique()->comment('SEO-friendly URL slug');
            $table->string('subdomain')->unique()->comment('lowercase subdomain.schoolpage.co.ke');

            // Location
            $table->foreignId('county_id')->constrained()->cascadeOnDelete()->index();
            $table->foreignId('subcounty_id')->constrained()->cascadeOnDelete()->index();
            $table->foreignId('ward_id')->constrained()->cascadeOnDelete()->index();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            // Contact
            $table->string('address')->nullable();
            $table->string('phone')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('website')->nullable();
            $table->string('principal_name')->nullable();

            // Classification (flexible)
            $table->string('category')->default('comprehensive');
            $table->string('type')->default('public');
            $table->string('gender')->default('mixed');

            // Branding & content
            $table->string('logo_path')->nullable();
            $table->string('motto')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('curriculum')->nullable();
            $table->text('description')->nullable();

            // Meta
            $table->timestamps();
            $table->softDeletes();

            // Search / performance
            $table->index(['county_id', 'subcounty_id', 'ward_id']);
            $table->index(['name', 'slug', 'subdomain']);
            $table->index(['latitude', 'longitude']);
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
