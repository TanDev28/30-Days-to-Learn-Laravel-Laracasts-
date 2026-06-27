<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    // THÊM HÀM NÀY: Một thẻ từ khóa có thể nằm trong nhiều Công việc (Jobs)
    public function jobs()
    {
        // Tại đây cột 'job_listing_id' đóng vai trò là cột liên kết của bảng đối tác (Related)
        return $this->belongsToMany(Job::class, relatedPivotKey: 'job_listing_id');
    }
}