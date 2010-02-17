<?php
    class Forum extends Doctrine_Record {

            public function setTableDefinition() {
                    $this->hasColumn('title', 'string', 255);
                    $this->hasColumn('description', 'string', 255);
                    $this->hasColumn('category_id', 'integer', 4);
            }

            public function setUp() {
                    $this->hasOne('Category', array( 'local' => 'category_id','foreign' => 'id'));
                    $this->hasMany('Thread as Threads', array( 'local' => 'id', 'foreign' => 'forum_id' ));
            }

    }
?>