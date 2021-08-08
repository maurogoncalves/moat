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
                 'constraint' => '70',
              ),
			   'role' => array(
                 'type' => 'INT',
                 'constraint' => '1',
              ),
           )
        );

        $this->dbforge->add_key('codigo', TRUE);
        $this->dbforge->create_table('users');
		
		$data = array('username' => 'admin','full_name' => 'owner','password' => '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92','role'=>'1');
        $this->db->insert('users', $data);
		
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}