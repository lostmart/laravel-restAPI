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
        Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('project_id')->constrained()->cascadeOnDelete();
        $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
        $table->string('title');
        $table->text('description')->nullable();
        $table->enum('status', ['todo','in_progress','done','blocked'])->default('todo');
        $table->tinyInteger('priority')->default(1); // 0=low,1=normal,2=high,3=urgent
        $table->date('due_date')->nullable();
        $table->timestamp('completed_at')->nullable();
        $table->unsignedInteger('position')->default(0);
        $table->timestamps();
        $table->softDeletes();

        $table->index(['project_id','status','priority']);
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
