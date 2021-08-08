<?php
class Migration_Add_artist extends CI_Migration
{
    public function up()
    {

        $this->dbforge->add_field(
           array(
              'id' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
              'name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '300',
              ),
			  
           )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('artist');
		
    }

    public function down()
    {
        $this->dbforge->drop_table('artist');
    }
}