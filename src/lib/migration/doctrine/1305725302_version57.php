<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version57 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->changeColumn('cf_credential', 'id', 'integer', '8', array(
             'autoincrement' => '1',
             'primary' => '1',
             ));
    }

    public function down()
    {

    }
}