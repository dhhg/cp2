<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
/**
 * Equipo Entity
 *
 * @property int $id
 * @property string $serie
 * @property bool $activo
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $tipo_id
 * @property int $modelo_id
 * @property int $marca_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Tipo $tipo
 * @property \App\Model\Entity\Modelo $modelo
 * @property \App\Model\Entity\Marca $marca
 * @property \App\Model\Entity\User $user
 */
class Equipo extends Entity
{

    //variables virtuales para obtener datos para desplegar en los select asi como los combobox.
    //
    //

    

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
