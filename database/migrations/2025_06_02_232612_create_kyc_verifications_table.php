<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('kyc_verifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('document_type', ['passport', 'national_id', 'drivers_license'])->nullable();
            $table->string('front_document_path')->nullable();
            $table->string('back_document_path')->nullable();
            $table->string('selfie_path')->nullable();
            $table->string('full_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('document_number')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('kyc_verifications');
    }
};
