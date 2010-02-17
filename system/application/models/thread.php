<?php
    class Thread extends Doctrine_Record {

            public function setTableDefinition() {
                    $this->hasColumn('title', 'string', 255);
                    $this->hasColumn('forum_id', 'integer', 4);
            }

            public function setUp() {
                    $this->hasOne('Forum', array( 'local' => 'forum_id', 'foreign' => 'id'));
                    $this->hasMany('Post as Posts', array( 'local' => 'id', 'foreign' => 'thread_id' ));
            }

    }
?>