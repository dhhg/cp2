<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Domicilio Entity
 *
 * @property int $id
 * @property string $calle
 * @property string $colonia
 * @property string $noint
 * @property string $noext
 * @property string $municipio
 * @property string $ciudad
 * @property string $estado
 * @property bool $activo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $cliente_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 * @property \App\Model\Entity\User $user
 */
class Domicilio extends Entity
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
