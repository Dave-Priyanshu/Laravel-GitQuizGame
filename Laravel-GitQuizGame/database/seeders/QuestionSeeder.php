<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Question; // Import the Question model

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load the JSON file
        $json = File::get(database_path('json/questions.json'));
        
        // Decode the JSON data into a collection of associative arrays
        $questions = collect(json_decode($json, true)); // true converts JSON objects to associative arrays
        
        // Insert each record into the database
        $questions->each(function ($question) {
            Question::create([
                'question' => $question['question'], // Use array notation
                'answer' => $question['answer'],
            ]);
        });
    }
}
