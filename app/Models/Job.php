<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Job extends Model
{
    use HasFactory;
    // Quy ước của Eloquent là tên class Job nó sẽ tìm trong database bảng jobs, nếu ko cần dòng bên dưới để lấy chính xác bảng
    protected $table = 'job_listings'; # Để ánh xạ từ bảng job_listings
    protected $fillable = ['title', 'salary']; # Các thuộc tính được cho phép với create()

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}