<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcfmailinglistauthorizationsetting extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_mailinglistauthorizationsetting', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 20,
              'primary' => true,
              'autoincrement' => true,
             ),
             'mailinglistversion_id' => 
             array(
              'type' => 'integer',
              'length' => 20,
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
        $this->dropTable('cf_mailinglistauthorizationsetting');
    }
}