<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // THÊM DÒNG NÀY: Tự động gọi bộ tạo công ty khi tạo việc làm
            'employer_id' => \App\Models\Employer::factory(),

            // Gọi Faker để tự sinh tên công việc tiếng Anh ngẫu nhiên
            'title' => fake()->jobTitle(),

            // Sinh mức lương ngẫu nhiên từ 30,000 đến 90,000 và nối thêm chuỗi USD
            'salary' => '$' . number_format(fake()->numberBetween(30000, 90000)) . ' USD',
        ];
    }
}