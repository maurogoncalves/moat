<?php
class Migration_Add_album extends CI_Migration
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
			  'artist_id' => array(
                 'type' => 'INT',
                 'constraint' => '11',
              ),			 
              'name' => array(
                 'type' => 'VARCHAR',
                 'constraint' => '300',
              ),
			   'year' => array(
                 'type' => 'INT',
                 'constraint' => '4',
              ),
           )
        );

        $this->dbforge->add_key('codigo', TRUE);
        $this->dbforge->create_table('album');
		
    }

    public function down()
    {
        $this->dbforge->drop_table('album');
    }
}