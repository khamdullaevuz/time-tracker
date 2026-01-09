<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            'KPI tizimi ishlab chiqish',
            'Oddiy userlarga faqat ozini yaratgan orderlarini korsatish',
            'Organisation structure ishlab chiqish',
            'XSS atakaga qarshi himoya',
            'AslBelgisi tizimi bilan integratsiya',
            'Ochiq apilarga rate limiter qoyish',
            'Userlarni kuzatish uchun user_devices funksionalini ishlab chiqish',
            'Payme nasiya bilan integratsiya',
            'Login pageni dizaynini ozgartirish',
            'Uzum nasiya bilan integratsiya',
            'Alif nasiya bilan integratsiya',
        ];

        foreach ($list as $task) {
            Task::create([
                'project_id' => 1,
                'user_id' => 1,
                'title' => $task,
                'status' => ['new', 'in_progress', 'done'][array_rand(['new', 'in_progress', 'done'])],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
