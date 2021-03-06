<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcfauthorizationconfiguration extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_authorizationconfiguration', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 20,
              'primary' => true,
              'autoincrement' => true,
             ),
             'type' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'deleteworkflow' => 
             array(
              'type' => 'integer',
              'length' => 3,
             ),
             'archiveworkflow' => 
             array(
              'type' => 'integer',
              'length' => 3,
             ),
             'stopneworkflow' => 
             array(
              'type' => 'integer',
              'length' => 3,
             ),
             'detailsworkflow' => 
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
        $this->dropTable('cf_authorizationconfiguration');
    }
}