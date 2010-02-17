<?php
    class Category extends Doctrine_Record {

            public function setTableDefinition() {
                    $this->hasColumn('title', 'string', 255);
            }

            public function setUp() {
                    $this->hasMany('Forum as Forums', array( 'local' => 'id', 'foreign' => 'category_id' ));
            }
    }
?>