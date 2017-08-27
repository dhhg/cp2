<?php

use Phinx\Migration\AbstractMigration;

class CreateEquiposTable extends AbstractMigration
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
        $table = $this->table('equipos');
        $table->addColumn('serie', 'string', array('limit' => 100 ))
              ->addColumn('activo', 'boolean')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();

        $refTable = $this->table('equipos');      
        $refTable->addColumn('tipo_id','integer',array('signed'=>'disable'))
                 ->addForeignKey('tipo_id','tipos','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                 ->addColumn('modelo_id','integer',array('signed'=>'disable'))
                 ->addForeignKey('modelo_id','modelos','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                 ->addColumn('marca_id','integer',array('signed'=>'disable'))
                 ->addForeignKey('marca_id','marcas','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                 ->addColumn('user_id','integer',array('signed'=>'disable'))
                 ->addForeignKey('user_id','users','id',array('delete'=>'CASCADE','update'=>'NO_ACTION'))
                 ->update();
    }
}
