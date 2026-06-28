<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => "Hi", //$greeting
        'name' => 'Duy Tân'
    ]);
});

// Route::get('/', function () {
//     $jobs = Job::all();
//     // dd($jobs); // Trả về mảng $jobs bên trong đó là mảng các đối tượng
//     // dd($jobs[0]); // Lấy đối tượng đầu tiên
//     dd($jobs[0]->title); // Lấy thuộc tính của đối tượng
// });

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    // $jobs = Job::with('employer')->paginate(3); // Trang có hiển thị số trang
    $jobs = Job::with('employer')->simplePaginate(3); // Trang đơn giản
    // $jobs = Job::all(); // Sẽ lỗi khi bật Model::preventLazyLoading();
    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);

    return view('job', [
        'job' => $job
    ]);
});
