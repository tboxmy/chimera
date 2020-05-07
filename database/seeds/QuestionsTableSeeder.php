<?php

use Illuminate\Database\Seeder;
use App\Question;
use App\AnswerMultiplechoice;
use App\AnswerTruefalse;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $n=20;
        for ($i = 0; $i < ($n/2); $i++) {
            Question::create([
                'topic_id' => $faker->numberBetween(1, 2),
                'name' => $faker->sentence,
                'description' => $faker->text,
                'type' => 'default',
            ]);
        };
        for ( ; $i < $n; $i++) {
            Question::create([
                'topic_id' => $faker->numberBetween(1, 2),
                'name' => $faker->sentence,
                'description' => $faker->text,
                'type' => 'truefalse',
            ]);
        };
        
        $numberOfQuestions = 4;
        for ($i = 0; $i < ($n/2); $i++) {
            $ans=$faker->numberBetween(0,$numberOfQuestions);
            for ($j = 0; $j < $numberOfQuestions; $j++) {
                $value = 0;
                if($j == $ans) $value=1;
                AnswerMultiplechoice::create([
                    'question_id' => ($i+1),
                    'name' => $faker->sentence,
                    'description' => $j, // $faker->text,
                    'weight' => $value,
                    'is_answer'=>$value,
                ]);
            }
        }
        $numberOfQuestions = 2;
        for (; $i < $n; $i++) {
            $value=$faker->numberBetween(0,($numberOfQuestions - 1));
            
            AnswerTruefalse::create([
                'question_id' => ($i+1),
               'name' => 'true',
                'description' => $faker->sentence, // True
                'weight' => $value,
                'is_answer'=>$value,
            ]);
            if($value>0) 
               $value = 0;
            else
                $value++;
            AnswerTruefalse::create([
                'question_id' => ($i+1),
                'name' => 'false',
                'description' => $faker->sentence, // False
                'weight' => $value,
                'is_answer'=>$value,
            ]);
        
        }

    }
}
