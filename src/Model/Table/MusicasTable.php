<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Musicas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Usuarios
 *
 * @method \App\Model\Entity\Musica get($primaryKey, $options = [])
 * @method \App\Model\Entity\Musica newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Musica[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Musica|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Musica patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Musica[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Musica findOrCreate($search, callable $callback = null, $options = [])
 */
class MusicasTable extends Table
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

        $this->setTable('musicas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('descricao');

        $validator
            ->date('data_album')
            ->allowEmpty('data_album');

        $validator
            ->dateTime('data_criacao')
            ->allowEmpty('data_criacao');

        $validator
            ->dateTime('data_atualizacao')
            ->allowEmpty('data_atualizacao');

        $validator
            ->integer('ordem')
            ->allowEmpty('ordem');

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
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));

        return $rules;
    }
}
