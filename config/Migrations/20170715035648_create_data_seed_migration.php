<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateDataSeedMigration extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Users', 50,[
                  'email' => function() use($faker){
                    return $faker->safeEmail();
                  },
                  'nombre' => function() use($faker){
                    return $faker->firstName();
                  },
                  'appaterno' => function() use($faker){
                    return $faker->lastName();
                  },
                  'apmaterno' => function() use($faker){
                    return $faker->lastName();
                  },
                  'role' => 'soporte',
                  'password' => function() {
                    $hasher = new DefaultPasswordHasher();
                    return $hasher->hash('secret');
                  },
                  'photo' => 'none',
                  'photo_dir' => 'none',
                  'activo' => function(){
                    return rand(0,1);
                  },
                  'created' => function() use ($faker){
                    return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
                  },
                  'modified' => function() use ($faker){
                    return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
                  }
                ]);
        $populator->execute();
    }
}
