<?php

use Phinx\Migration\AbstractMigration;

class Domicilios extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('domicilios');
        $table->addColumn('calle', 'string', array('limit' => 100 ))
              ->addColumn('colonia', 'string', array('limit' => 100 ))
              ->addColumn('noint', 'string', array('limit' => 50 ))
              ->addColumn('noext', 'string', array('limit' => 50 ))
              ->addColumn('municipio', 'string', array('limit' => 100 ))
              ->addColumn('ciudad', 'string', array('limit' => 100 ))
              ->addColumn('estado', 'string', array('limit' => 100 ))
              ->addColumn('activo', 'boolean')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

        $refTable = $this->table('domicilios');      
        $refTable->addColumn('cliente_id','integer',array('signed'=>'disable'))
                 ->addForeignKey('cliente_id','clientes','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                 ->addColumn('user_id','integer',array('signed'=>'disable'))
                 ->addForeignKey('user_id','users','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                 ->update();
    }
}
