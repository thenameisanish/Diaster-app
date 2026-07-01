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

    $table->foreignId('user_id')->constrained()->cascadeOnDelete();

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

    $table->string('phone');
    $table->string('website')->nullable();

    $table->text('address');

    $table->string('district');

    $table->string('province');

    $table->string('representative_name');

    $table->string('representative_position');

    $table->string('representative_phone');

    $table->string('representative_email');

    $table->string('registration_certificate');

    $table->string('pan_certificate')->nullable();

    $table->string('representative_id');

    $table->integer('capacity')->default(0);

    $table->enum('status', [
        'Pending',
        'Approved',
        'Rejected'
    ])->default('Pending');

    $table->text('rejection_reason')->nullable();

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
