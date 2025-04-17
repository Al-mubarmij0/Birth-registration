<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            // Register Info
            $table->string('registration_center');
            $table->string('state');
            $table->string('lga');
            $table->date('registration_date');
            
            // Birth Info
            $table->string('first_name');
            $table->string('surname');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('place_of_birth');

            // Parent Info
            $table->string('father_name');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_occupation');

            // Registration Status
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
