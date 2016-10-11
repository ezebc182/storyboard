<?php

use Phinx\Migration\AbstractMigration;

class CreateStoriesTable extends AbstractMigration
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

        $table = $this->table("stories")
            ->addColumn("title","string")
            ->addColumn("description","text")
            ->addColumn("complexity","enum",["values"="low,medium,high"])
            ->addColumn("created","datetime")
            ->addColumn("modified","datetime")
            ->addColumn("user_id","integer",["signed"=>"disable"])
            ->addForeignKey("user_id","users","id",["update" => "NO_ACTION","delete"=>"CASCADE"])
            ->create();
    }
}
