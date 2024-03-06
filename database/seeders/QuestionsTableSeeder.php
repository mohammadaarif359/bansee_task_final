<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question_text' => 'Who Created Laravel?',
                'option_a' => 'Margon Stan',
                'option_b' => 'Taylor Otwell',
                'option_c' => 'Samsy Twig',
                'option_d' => 'None of these',
                'correct_option' => 'option_b',
            ],
            [
                'question_text' => 'What is the use of .env file in Laravel?',
                'option_a' => 'Setting Up local Environment variable',
                'option_b' => 'Optimization',
                'option_c' => 'Hosting',
                'option_d' => 'None of these',
                'correct_option' => 'option_a',
            ],
            [
                'question_text' => 'Command to start Laravel Application?',
                'option_a' => 'php artisan new',
                'option_b' => 'php artisan',
                'option_c' => 'php artisan start',
                'option_d' => 'php artisan serve',
                'correct_option' => 'option_d',
            ],
            [
                'question_text' => 'Command to install laravel project?',
                'option_a' => 'composer create-project laravel/laravel myproject',
                'option_b' => 'composer new-project laravel/laravel myproject',
                'option_c' => 'composer create-project new laravel/laravel myproject',
                'option_d' => 'None of these',
                'correct_option' => 'option_a',
            ],
            [
                'question_text' => 'By default laravel project runs on which PORT?',
                'option_a' => '3000',
                'option_b' => '5000',
                'option_c' => '8000',
                'option_d' => '7000',
                'correct_option' => 'option_c',
            ],
            [
                'question_text' => 'CLI Command to migrate in Laravel project?',
                'option_a' => 'php artisan create migration',
                'option_b' => 'php artisan migrate',
                'option_c' => 'php artisan serve',
                'option_d' => 'None of the above',
                'correct_option' => 'option_b',
            ],
            [
                'question_text' => 'Command to get the route list in Laravel?',
                'option_a' => 'php artisan list',
                'option_b' => 'php artisan route:list',
                'option_c' => 'php artisan route',
                'option_d' => 'php artisan list:all',
                'correct_option' => 'option_b',
            ],
            [
                'question_text' => 'CLI Command to create controller in laravel?',
                'option_a' => 'php artisan make:controller Mycontroller',
                'option_b' => 'php artisan create:controller Mycontroller',
                'option_c' => 'php artisan controller Mycontroller',
                'option_d' => 'None of these',
                'correct_option' => 'option_b',
            ],
            [
                'question_text' => 'Command to make migration in laravel?',
                'option_a' => 'php artisan migration table',
                'option_b' => 'php artisan make:migration create_tags_table',
                'option_c' => 'php artisan make-migration digit',
                'option_d' => 'None of these',
                'correct_option' => 'option_b',
            ],
            [
                'question_text' => 'Command to check the status of migration in laravel application?',
                'option_a' => 'php artisan migration status',
                'option_b' => 'php artisan status',
                'option_c' => 'php artisan migrate:status',
                'option_d' => 'None of these',
                'correct_option' => 'option_c',
            ],
        ];
		foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
