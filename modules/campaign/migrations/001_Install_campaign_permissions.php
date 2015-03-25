<?php defined('BASEPATH') || exit('No direct script access allowed');

class Migration_Install_campaign_permissions extends Migration
{
	/**
	 * @var array Permissions to Migrate
	 */
	private $permissionValues = array(
		array(
			'name' => 'Campaign.Content.View',
			'description' => 'View Campaign Content',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Content.Create',
			'description' => 'Create Campaign Content',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Content.Edit',
			'description' => 'Edit Campaign Content',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Content.Delete',
			'description' => 'Delete Campaign Content',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Reports.View',
			'description' => 'View Campaign Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Reports.Create',
			'description' => 'Create Campaign Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Reports.Edit',
			'description' => 'Edit Campaign Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Reports.Delete',
			'description' => 'Delete Campaign Reports',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Settings.View',
			'description' => 'View Campaign Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Settings.Create',
			'description' => 'Create Campaign Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Settings.Edit',
			'description' => 'Edit Campaign Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Settings.Delete',
			'description' => 'Delete Campaign Settings',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Developer.View',
			'description' => 'View Campaign Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Developer.Create',
			'description' => 'Create Campaign Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Developer.Edit',
			'description' => 'Edit Campaign Developer',
			'status' => 'active',
		),
		array(
			'name' => 'Campaign.Developer.Delete',
			'description' => 'Delete Campaign Developer',
			'status' => 'active',
		),
    );

    /**
     * @var string The name of the permission key in the role_permissions table
     */
    private $permissionKey = 'permission_id';

    /**
     * @var string The name of the permission name field in the permissions table
     */
    private $permissionNameField = 'name';

	/**
	 * @var string The name of the role/permissions ref table
	 */
	private $rolePermissionsTable = 'role_permissions';

    /**
     * @var numeric The role id to which the permissions will be applied
     */
    private $roleId = '1';

    /**
     * @var string The name of the role key in the role_permissions table
     */
    private $roleKey = 'role_id';

	/**
	 * @var string The name of the permissions table
	 */
	private $tableName = 'permissions';

	//--------------------------------------------------------------------

	/**
	 * Install this version
	 *
	 * @return void
	 */
	public function up()
	{
		$rolePermissionsData = array();
		foreach ($this->permissionValues as $permissionValue) {
			$this->db->insert($this->tableName, $permissionValue);

			$rolePermissionsData[] = array(
                $this->roleKey       => $this->roleId,
                $this->permissionKey => $this->db->insert_id(),
			);
		}

		$this->db->insert_batch($this->rolePermissionsTable, $rolePermissionsData);
	}

	/**
	 * Uninstall this version
	 *
	 * @return void
	 */
	public function down()
	{
        $permissionNames = array();
		foreach ($this->permissionValues as $permissionValue) {
            $permissionNames[] = $permissionValue[$this->permissionNameField];
        }

        $query = $this->db->select($this->permissionKey)
                          ->where_in($this->permissionNameField, $permissionNames)
                          ->get($this->tableName);

        if ( ! $query->num_rows()) {
            return;
        }

        $permissionIds = array();
        foreach ($query->result() as $row) {
            $permissionIds[] = $row->{$this->permissionKey};
        }

        $this->db->where_in($this->permissionKey, $permissionIds)
                 ->delete($this->rolePermissionsTable);

        $this->db->where_in($this->permissionNameField, $permissionNames)
                 ->delete($this->tableName);
	}
}