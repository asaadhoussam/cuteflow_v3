<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcfworkflowslotfile extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_workflowslotfile', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 20,
              'primary' => true,
              'autoincrement' => true,
             ),
             'workflowslotfield_id' => 
             array(
              'type' => 'integer',
              'length' => 20,
             ),
             'filename' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'hashname' => 
             array(
              'type' => 'string',
              'length' => 255,
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
        $this->dropTable('cf_workflowslotfile');
    }
}