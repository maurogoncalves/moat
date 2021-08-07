<?php
class Migration_Add_user extends CI_Migration
{
    public function up()
    {

        $this->dbforge->add_field(
           array(
              'codigo' => array(
                 'type' => 'INT',
                 'constraint' => 11,
                 'unsigned' => true,
                 'auto_increment' => true
              ),
			  'username' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '50',
              ),			 
              'full_name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '300',
              ),
              'password' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '30',
              ),
			   'role' => array(
                 'type' => 'INT',
                 'constraint' => '1',
              ),
           )
        );

        $this->dbforge->add_key('codigo', TRUE);
        $this->dbforge->create_table('users');
		
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}