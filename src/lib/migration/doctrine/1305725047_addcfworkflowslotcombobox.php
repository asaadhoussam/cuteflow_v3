<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcfworkflowslotcombobox extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_workflowslotcombobox', array(
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
             'fieldcombobox_id' => 
             array(
              'type' => 'integer',
              'length' => 20,
             ),
             'value' => 
             array(
              'type' => 'integer',
              'length' => 20,
             ),
             'position' => 
             array(
              'type' => 'integer',
              'length' => 3,
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
        $this->dropTable('cf_workflowslotcombobox');
    }
}