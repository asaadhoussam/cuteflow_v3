<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcffieldnumber extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_fieldnumber', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 20,
              'primary' => true,
              'autoincrement' => true,
             ),
             'field_id' => 
             array(
              'type' => 'integer',
              'length' => 20,
             ),
             'regex' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'defaultvalue' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'comboboxvalue' => 
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
        $this->dropTable('cf_fieldnumber');
    }
}