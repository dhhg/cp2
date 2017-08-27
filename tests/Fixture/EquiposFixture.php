<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EquiposFixture
 *
 */
class EquiposFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'serie' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'activo' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'tipo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modelo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'marca_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'tipo_id' => ['type' => 'index', 'columns' => ['tipo_id'], 'length' => []],
            'modelo_id' => ['type' => 'index', 'columns' => ['modelo_id'], 'length' => []],
            'marca_id' => ['type' => 'index', 'columns' => ['marca_id'], 'length' => []],
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'equipos_ibfk_1' => ['type' => 'foreign', 'columns' => ['tipo_id'], 'references' => ['tipos', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'equipos_ibfk_2' => ['type' => 'foreign', 'columns' => ['modelo_id'], 'references' => ['modelos', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'equipos_ibfk_3' => ['type' => 'foreign', 'columns' => ['marca_id'], 'references' => ['marcas', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
            'equipos_ibfk_4' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'serie' => 'Lorem ipsum dolor sit amet',
            'activo' => 1,
            'created' => '2017-08-13 04:05:19',
            'modified' => '2017-08-13 04:05:19',
            'tipo_id' => 1,
            'modelo_id' => 1,
            'marca_id' => 1,
            'user_id' => 1
        ],
    ];
}
