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
        Schema::create('group_users', function (Blueprint $table) {
           $table->id();
            
            // Khóa ngoại liên kết tới bảng groups và users
            $table->foreignId('group_id')->constrained('groups')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            
            // Các cột nghiệp vụ từ video
            $table->string('status', 25); // Ví dụ: approved, pending
            $table->string('role', 25);   // Ví dụ: admin, member
            $table->string('token', 1024)->nullable();
            $table->timestamp('token_expire_date')->nullable();
            $table->timestamp('token_used')->nullable();
            $table->foreignId('created_by')->constrained('users');
            $table->timestamp('created_at')->nullable();
            // Ràng buộc để một người không thể ở trong một nhóm 2 lần
            $table->unique(['group_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_users');
    }
};
