<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addcfuserdata extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('cf_userdata', array(
             'user_id' => 
             array(
              'type' => 'integer',
              'length' => 20,
              'primary' => true,
             ),
             'firstname' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'lastname' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'street' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'zip' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'city' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'country' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'phone1' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'phone2' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'mobile' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'fax' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'organisation' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'department' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'burdencenter' => 
             array(
              'type' => 'string',
              'length' => 255,
             ),
             'comment' => 
             array(
              'type' => 'string',
              'length' => 1000,
             ),
             'lastaction' => 
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
              0 => 'user_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('cf_userdata');
    }
}