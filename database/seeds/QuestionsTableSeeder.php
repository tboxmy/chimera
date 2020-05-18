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
        $n=10; // random number of questions
        $position=1;
        for ($i = 0; $i < ($n/2); $i++) {
            Question::create([
                'topic_id' => $faker->numberBetween(1, 2),
                'name' => $faker->sentence,
                'description' => $faker->text,
                'type' => 'default',
                'position'    => ($position),
            ]);
        };
        for ( ; $i < $n; $i++) {
            Question::create([
                'topic_id' => $faker->numberBetween(1, 2),
                'name' => $faker->sentence,
                'description' => $faker->text,
                'type' => 'truefalse',
                'position'    => ($position),
            ]);
        };
        
        $numberOfQuestions = 4;
        for ($i = 0; $i < ($n/2); $i++) {
            $ans=$faker->numberBetween(0,$numberOfQuestions - 1);
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

        $q =    array (
            array('The tallest building in the world is located in which city?','buildings','default'),
            array('How many hearts does an octopus have?','fauna','default'),
            array('Elephant is a crustacian.','fauna','truefalse'),
            array('Kuala Lumpur is the capital of Malaysia.','building','default')
        );

        $ans = array(
            array('default','Malaysia','New York','Spain','Dubai',1,4),
            array('default','1','2','3','4',1,3),
            array('truefalse',1,2),
            array('truefalse',1,1)
        );
        for ($k = 0; $k < count($q); $k++) {            
                //
            $questionItem = $q[$k];
            $i++;
            Question::create([
                'id' => $i,
                'topic_id' => 2,
                'name' => $questionItem[0],
                'description' => $questionItem[1],
                'type' => $questionItem[2],
                'position'    => 1
            ]);            
            $answerItem = $ans[$k];
            if($answerItem[0] == 'default'){
                //
                for( $itemCount=1; $itemCount<=4; $itemCount++){
                    //
                    AnswerMultiplechoice::create([
                        'question_id' => ($i),
                        'name' => $answerItem[$itemCount] ,
                        'description' => $j, // $faker->text,
                        'weight' => ($itemCount == $answerItem[6])?1:0,
                        'is_answer'=>($itemCount == $answerItem[6])?1:0
                    ]);
                }
                
            } else {
                AnswerTruefalse::create([
                    'question_id' => ($i),
                    'name' => 'true',
                    'description' => $j, 
                    'weight' => ($answerItem[2]==1)?1:0,
                    'is_answer'=>($answerItem[2]==1)?1:0
                ]);
                AnswerTruefalse::create([
                    'question_id' => ($i),
                    'name' => 'false',
                    'description' => $j,
                    'weight' => ($answerItem[2]==2)?1:0,
                    'is_answer'=>($answerItem[2]==2)?1:0,
                ]);
            }
            
        }           

    }
}
