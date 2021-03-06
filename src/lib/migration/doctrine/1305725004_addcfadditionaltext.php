<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcfadditionaltext extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_additionaltext', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 20,
              'primary' => true,
              'autoincrement' => true,
             ),
             'title' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'content' => 
             array(
              'type' => 'string',
              'length' => 5000,
             ),
             'contenttype' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'isactive' => 
             array(
              'type' => 'integer',
              'length' => 3,
             ),
             'deleted_at' => 
             array(
              'notnull' => false,
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('cf_additionaltext');
    }
}