<?php
use Migrations\AbstractMigration;

class Usuarios extends AbstractMigration
{

    public function up()
    {

        $this->table('usuarios')
            ->addColumn('role', 'string', [
                'after' => 'password',
                'default' => 'comum',
                'length' => 20,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('usuarios')
            ->removeColumn('role')
            ->update();
    }
}

