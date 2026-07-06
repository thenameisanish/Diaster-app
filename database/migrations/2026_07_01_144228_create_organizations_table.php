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
        Schema::create('organizations', function (Blueprint $table) {

            $table->id();

            // User Account
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            // Basic Information
            $table->string('organization_name');
            $table->string('registration_number')->unique();

            $table->enum('organization_type', [
                'NGO',
                'INGO',
                'Government',
                'Charity',
                'Community',
                'Other'
            ]);

            $table->integer('years_of_operation')->default(0);

            $table->text('description')->nullable();

            $table->string('logo')->nullable();

            // Contact Information
            $table->string('email')->unique();

            $table->string('phone');

            $table->string('website')->nullable();

            $table->text('address');

            $table->string('province');

            $table->string('district');

            // Representative Information
            $table->string('representative_name');

            $table->string('representative_position');

            $table->string('representative_phone');

            $table->string('representative_email');

            // Documents
            $table->string('registration_certificate');

            $table->string('pan_certificate')->nullable();

            $table->string('representative_id');

            // Resources They Can Provide
            $table->boolean('food')->default(false);

            $table->boolean('water')->default(false);

            $table->boolean('medicine')->default(false);

            $table->boolean('shelter')->default(false);

            $table->boolean('clothes')->default(false);

            $table->boolean('rescue_equipment')->default(false);

            $table->boolean('transportation')->default(false);

            // Organization Capacity
            $table->integer('capacity')->default(0);

            // Approval
            $table->enum('status', [
                'Pending',
                'Approved',
                'Rejected'
            ])->default('Pending');

            $table->text('rejection_reason')->nullable();

            $table->timestamp('approved_at')->nullable();

            $table->foreignId('approved_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};