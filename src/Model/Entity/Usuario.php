<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property \Cake\I18n\Time $data_nascimento
 * @property string $nome
 * @property string $texto
 * @property string $sexo
 * @property string $avatar
 * @property string $cidade
 * @property string $telefone
 * @property bool $fanhoso
 * @property bool $mudo
 * @property \Cake\I18n\Time $data_criacao
 * @property \Cake\I18n\Time $data_atualizacao
 * @property \Cake\I18n\Time $data_acesso
 * @property int $pai_id
 * @property int $mae_id
 * @property int $conjuge_id
 *
 * @property \App\Model\Entity\Usuario $usuario
 * @property \App\Model\Entity\Albun[] $albuns
 * @property \App\Model\Entity\Musica[] $musicas
 */
class Usuario extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
}
