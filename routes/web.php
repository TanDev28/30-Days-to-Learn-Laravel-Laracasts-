<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Arr;

Route::get('/', function () {
    return view('home', [
        'greeting' => "Hi", //$greeting
        'name' => 'Duy Tân'
    ]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,000'
            ],
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '$10,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '$40,000'
            ]
        ]
    ]);
});

Route::get('/jobs/{id}', function ($id) {
    // dd($id); // Xem $id đã được lấy từ url chưa
    $jobs = [
        [
            'id' => 1,
            'title' => 'Director',
            'salary' => '$50,000'
        ],
        [
            'id' => 2,
            'title' => 'Programmer',
            'salary' => '$10,000'
        ],
        [
            'id' => 3,
            'title' => 'Teacher',
            'salary' => '$40,000'
        ]
    ];

    // phải dùng use($id) vì Closure không truy cập được biến $id bên ngoài.
    // $job = Arr::first($jobs, function ($job) use ($id) {
    //     return $job['id'] == $id;
    // });
    // Có thể thay bằng code bên dưới ngắn hơn, nên ưu tiên
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // dd($job); // Xem lấy được gì từ $job

    return view('job', [
        'job' => $job
    ]);
});