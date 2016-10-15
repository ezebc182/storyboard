<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Stories
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Stories', [
            'foreignKey' => 'user_id'
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
        ->requirePresence('first_name', 'create')
        ->notEmpty('first_name','Complete este campo');

        $validator
        ->requirePresence('last_name', 'create')
        ->notEmpty('last_name','Complete este campo');

        $validator
        ->notEmpty('email','Complete este campo.')
        ->requirePresence('email','create')
        ->add('email', 'validFormat', [
            'rule' => 'email',
            'message' => 'Ingrese un correo electrónico válido.'
            ]);
        
        $validator
        ->requirePresence('password', 'create')
        ->notEmpty('password','Complete este campo','create');

        $validator
        ->requirePresence('role', 'create')
        ->notEmpty('role');

        $validator
        ->boolean('active')
        ->requirePresence('active', 'create')
        ->notEmpty('active');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
    /**
     * Retorna el id, email, password, first_name, last_name y role de usuarios activos.
     * @param  \Cake\ORM\Query $query   [description]
     * @param  array           $options [description]
     * @return \Cake\ORM\Query          [description]
     */
    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query->select(['id','first_name','last_name','email','password','role'])
        ->where(['Users.active' => 1]);

        return $query;
    }

    public function recoverPassword($id)
    {
        $user = $this->get($id);
        return $user->password;

    }

    public function beforeDelete($event, $entity, $options)
    {

        if($entity->role == 'admin')
        {
            return false;    
        }
        return true;
    }
}
