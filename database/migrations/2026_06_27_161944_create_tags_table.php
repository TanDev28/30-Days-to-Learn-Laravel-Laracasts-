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
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Cột tên thẻ (Ví dụ: PHP, Laravel, C#)
            $table->timestamps();
        });

        // 2. Tạo bảng trung gian kết nối Nhiều - Nhiều (job_tag)
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();

            // Khóa ngoại trỏ sang bảng job_listings (Phải chỉ định rõ tên cột 'job_listing_id')
            $table->foreignIdFor(\App\Models\Job::class, 'job_listing_id')->constrained()->cascadeOnDelete();

            // Khóa ngoại trỏ sang bảng tags
            $table->foreignIdFor(\App\Models\Tag::class)->constrained()->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Khi rollback, ta phải xóa bảng trung gian trước để tránh xung đột khóa ngoại
        Schema::dropIfExists('job_tag');
        Schema::dropIfExists('tags');
    }
};