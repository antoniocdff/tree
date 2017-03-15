<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Musica Entity
 *
 * @property int $id
 * @property int $usuario_id
 * @property string $titulo
 * @property string $descricao
 * @property \Cake\I18n\Time $data_album
 * @property \Cake\I18n\Time $data_criacao
 * @property \Cake\I18n\Time $data_atualizacao
 * @property int $ordem
 *
 * @property \App\Model\Entity\Usuario $usuario
 */
class Musica extends Entity
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
}
