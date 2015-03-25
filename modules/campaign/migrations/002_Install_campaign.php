<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_campaign extends Migration
{
	/**
	 * @var string The name of the database table
	 */
	private $table_name = 'campaign';

	/**
	 * @var array The table's fields
	 */
	private $fields = array(
		'id' => array(
			'type'       => 'INT',
			'constraint' => 11,
			'auto_increment' => true,
		),
        'name' => array(
            'type'       => 'VARCHAR',
            'constraint' => 255,
            'null'       => false,
        ),
        'budget' => array(
            'type'       => 'BIGINT',
            'constraint' => 11,
            'null'       => false,
        ),
        'budget_daily' => array(
            'type'       => 'BIGINT',
            'constraint' => 11,
            'null'       => false,
        ),
        'bid' => array(
            'type'       => 'BIGINT',
            'constraint' => 11,
            'null'       => false,
        ),
        'category_id' => array(
            'type'       => 'BIGINT',
            'constraint' => 11,
            'null'       => false,
        ),
        'state' => array(
            'type'       => 'TEXT',
            'null'       => false,
        ),
        'device' => array(
            'type'       => 'ENUM',
            'constraint' => '\'all\',\'mobile\',\'desktop\'',
            'null'       => false,
        ),
        'created_on' => array(
            'type'       => 'DATETIME',
            'null'       => false,
            'default'    => '0000-00-00 00:00:00',
        ),
        
	);

	/**
	 * Install this version
	 *
	 * @return void
	 */
	public function up()
	{
		$this->dbforge->add_field($this->fields);
		$this->dbforge->add_key('id', true);
		$this->dbforge->create_table($this->table_name);
	}

	/**
	 * Uninstall this version
	 *
	 * @return void
	 */
	public function down()
	{
		$this->dbforge->drop_table($this->table_name);
	}
}