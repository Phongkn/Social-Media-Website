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
        Schema::create('post_attachments', function (Blueprint $table) {
            $table->id();

            // Khóa ngoại liên kết đến bảng posts (Thêm cascade để tự động xóa tệp khi xóa post)
            $table->foreignId('post_id')->constrained('posts')->cascadeOnDelete();

            // Các cột thông tin tệp đính kèm từ video
            $table->string('name', 255);       // Ví dụ: test.png
            $table->string('path', 255);       // Đường dẫn lưu trữ trong storage
            $table->string('url', 1024);       // URL đầy đủ để hiển thị công khai
            $table->string('mime', 25);        // Loại tệp, ví dụ: image/png
            $table->integer('size');           // Dung lượng file (bytes)
            $table->foreignId('created_by')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_attachments');
    }
};
