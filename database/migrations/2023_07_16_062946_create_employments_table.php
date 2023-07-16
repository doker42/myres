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
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->char('dateRange');
            $table->char('companyName');
            $table->char('typeJob')->nullable();
            $table->string('position', 100);
            $table->text('library')->nullable();
            $table->text('langs');
            $table->string('stack', 255)->nullable();
            $table->text('additions')->nullable();
            $table->string('companyLink',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employments');
    }
};
