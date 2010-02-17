<?php
	// system/application/models/user.php
	class User extends Doctrine_Record {

		public function setTableDefinition() {
			$this->hasColumn('username', 'string', 255);
			$this->hasColumn('password', 'string', 255);
			$this->hasColumn('email', 'string', 255, array('unique' => 'true'));
		}
		public function setUp()
		{
                        $this->setTableName('user');
        		$this->actAs('Timestampable');
                	$this->hasMutator('password', '_encrypt_password');
                        $this->hasMany('Post as Posts', array( 'local' => 'id', 'foreign' => 'user_id' ));
		}

                protected function _encrypt_password($value)
		{
			$salt = '#%SDF#$Dsd3';
			$this->_set('password', md5($salt . $value));
		}
		
	}
?>