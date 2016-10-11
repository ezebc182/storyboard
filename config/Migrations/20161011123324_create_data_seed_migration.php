<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;
class CreateDataSeedMigration extends AbstractMigration
{
   public function up(){
     $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);
        $populator->addEntity("Users",50,[
            "first_name" => function() use($faker){
                return $faker->firstName();
            },
            "last_name" => function() use($faker){
                return $faker->lastName();
            },
            "email" => function() use($faker){
                return $faker->safeEmail();
            },
             "password"  =>  function (){
                $hasher = new DefaultPasswordHasher();
                return $hasher->hash("123123");
            },
            "role" => "user",
            "active" => function(){
                return rand(0,1);
            },
            "created"   =>  function() use($faker){
                return $faker->dateTimeBetween($startDate = "now",
                    $endDate = "now");
            },
             "modified"   =>  function() use($faker){
                return $faker->dateTimeBetween($startDate = "now",
                    $endDate = "now");
            }
        ]);

        $populator->execute();

        $populator->addEntity("Stories",250,[
            "title" => function() use($faker){
                return $faker->sentence($nbWords = 3, $variableNbWords = true);
            },
            "description" => function() use($faker){
               return $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
            },
            "complexity" => function() {
                $complexities = ["low","medium","high"];
                return $complexities[rand(0,2)];
            },
            "user_id" => function(){
                return rand(1,51);
            },
            "created"   =>  function() use($faker){
                return $faker->dateTimeBetween($startDate = "now",
                    $endDate = "now");
            },
             "modified"   =>  function() use($faker){
                return $faker->dateTimeBetween($startDate = "now",
                    $endDate = "now");
            }
        ]);
       $populator->execute();

   }
}
