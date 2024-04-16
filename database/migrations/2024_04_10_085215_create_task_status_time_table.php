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
        Schema::create('task_status_time', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_status_id')->nullable();
            $table->unsignedBigInteger('task_id')->nullable();
            $table->dateTime('date')->default(null);

            $table->foreign('task_status_id')->references('id')->on('task_statuses');
            $table->foreign('task_id')->references('id')->on('task');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task_status_time');
    }
};
