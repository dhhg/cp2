<?php

use Phinx\Migration\AbstractMigration;

class CreateUsersTable extends AbstractMigration
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
        $table = $this->table('users');
        $table->addColumn('email', 'string', array('limit' => 100 ))
              ->addColumn('nombre', 'string', array('limit' => 100 ))
              ->addColumn('appaterno', 'string', array('limit' => 100 ))
              ->addColumn('apmaterno', 'string', array('limit' => 100 ))
              ->addColumn('role', 'enum', array('values' => ('admin, soporte') ))
              ->addColumn('password', 'string')
              ->addColumn('photo', 'string')
              ->addColumn('photo_dir','string')
              ->addColumn('activo', 'boolean')
              ->addColumn('created', 'datetime')
              ->addColumn('modified', 'datetime')
              ->create();
    }
}
