<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('certifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['honey', 'water', 'salt', 'flour', 'oil']);
            $table->string('status');
            $table->date('issue_date');
            $table->date('expiry_date');
            $table->string('certificate_number');
            $table->string('laboratory');
            $table->text('description')->nullable();
            $table->string('file_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('certifications');
    }
}; 