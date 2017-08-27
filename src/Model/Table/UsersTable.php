<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

//proffer
        $this->addBehavior('Proffer.Proffer', [
            'photo' => [    // The name of your upload field
                'root' => WWW_ROOT . 'files', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
                'thumbnailSizes' => [ // Declare your thumbnails
                    'square' => [   // Define the prefix of your thumbnail
                        'w' => 200, // Width
                        'h' => 200, // Height
                        'crop' => true,
                        'jpeg_quality'  => 100
                    ]                    
                ],
                'thumbnailMethod' => 'gd'   // Options are Imagick or Gd
            ]
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('appaterno', 'create')
            ->notEmpty('appaterno');

        $validator
            ->requirePresence('apmaterno', 'create')
            ->notEmpty('apmaterno');

        $validator
            ->requirePresence('role', 'create')
            ->notEmpty('role');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->requirePresence('photo', 'create')
            ->notEmpty('photo','create')
            ->allowEmpty('photo','update');
            /*  ->provider('proffer', 'Proffer\Model\Validation\ProfferRules')
              ->add('photo','proffer',[
                'rule' => ['dimensions',[
                    'min' => ['w' => 300, 'h' => 300], 
                    'max' => ['w' => 1500, 'h' => 1500]
                    ]],
                'message' => 'La imagen no tiene correctas dimensiones',
                'provider' => 'proffer'
                ])
              ->add('photo', 'extension',[
                'rule' => ['extesion', ['jpeg', 'png', 'jpg']],
                'message' => 'La imagen no tiene una correcta extensión'
                ])
              ->add('photo', 'fileSize', [
                'rule' => ['fileSize', '<=', '1MB'],
                'message' => 'La imagen no debe exceder 1MB'
                ])
              ->add('photo','mimeType',[
                'rule' => ['mimeType', ['image/jpeg', 'image/png']],
                'message' => 'La imagen no tiene un correcto formato'
                ])
              ->requirePresence('photo', 'create')
              ->notEmpty('photo',null,'create');
        */

        /*$validator
            ->requirePresence('photo_dir', 'create')
            ->notEmpty('photo_dir');*/

        /*$validator
            ->boolean('activo')
            ->requirePresence('activo', 'create')
            ->notEmpty('activo');*/

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email'],'La dirección de correo electrónico ya se encuentra registrada'));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
      $query->select(['id', 'email', 'nombre', 'appaterno', 'apmaterno', 'password', 'role'])
            ->where(['Users.activo' => 1]);
      return $query;
    }

    public  function recoveryPassword($id)
    {
      $user = $this->get(id);
      return $user->password;
    }
    
}
