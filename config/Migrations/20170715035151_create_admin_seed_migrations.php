<?php

use Phinx\Migration\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateAdminSeedMigrations extends AbstractMigration
{
    public function up()
    {
        $faker = \Faker\Factory::create();
        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Users',1,[
                    'email' => 'horaciohdez@cyberplus.com.mx',
                    'nombre' => 'Daniel Horacio',
                    'appaterno' => 'Hernández',
                    'apmaterno' => 'Granillo',
                    'role' => 'admin',
                    'password' => function(){
                        $hasher = new DefaultPasswordHasher();
                        return $hasher->hash('191082');
                    },
                    'photo' => 'none',
                    'photo_dir' => 'none',
                    'created' => function() use ($faker){
                        return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
                    },
                    'modfied' => function() use ($faker){
                        return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
                    }
                ]);
        $populator->execute();
    }
}
