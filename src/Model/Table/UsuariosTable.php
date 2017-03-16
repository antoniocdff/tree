<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 * @property \Cake\ORM\Association\HasMany $Albuns
 * @property \Cake\ORM\Association\HasMany $Musicas
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Image.Image', [
            'path' => WWW_ROOT . 'assets',
            'fields' => [
                'image' => 'one',
            ],
        ]);

        $this->belongsTo('Pai', [
            'className' => 'Usuarios',
            'foreignKey' => 'pai_id'
        ]);
        $this->belongsTo('Mae', [
            'className' => 'Usuarios',
            'foreignKey' => 'mae_id'
        ]);
        $this->belongsTo('Conjuge', [
            'className' => 'Usuarios',
            'foreignKey' => 'conjuge_id'
        ]);
        $this->hasMany('Albuns', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Musicas', [
            'foreignKey' => 'usuario_id'
        ]);
        $this->hasMany('Paifilhos', [
            'className' => 'Usuarios',
            'foreignKey' => 'pai_id'
        ]);
        $this->hasMany('Maefilhos', [
            'className' => 'Usuarios',
            'foreignKey' => 'mae_id'
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
            ->allowEmpty('password');

        $validator
            ->date('data_nascimento')
            ->allowEmpty('data_nascimento');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('texto');

        $validator
            ->allowEmpty('sexo');

        $validator
            ->allowEmpty('avatar');

        $validator
            ->allowEmpty('cidade');

        $validator
            ->allowEmpty('telefone');

        $validator
            ->boolean('fanhoso')
            ->allowEmpty('fanhoso');

        $validator
            ->boolean('mudo')
            ->allowEmpty('mudo');

        $validator
            ->dateTime('data_criacao')
            ->allowEmpty('data_criacao');

        $validator
            ->dateTime('data_atualizacao')
            ->allowEmpty('data_atualizacao');

        $validator
            ->dateTime('data_acesso')
            ->allowEmpty('data_acesso');

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
        $rules->add($rules->existsIn(['pai_id'], 'Pai'));
        $rules->add($rules->existsIn(['mae_id'], 'Mae'));
        $rules->add($rules->existsIn(['conjuge_id'], 'Conjuge'));

        return $rules;
    }
}
