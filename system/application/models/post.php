<?php

    class Post extends Doctrine_Record {

            public function setTableDefinition() {
                    $this->hasColumn('content', 'string', 65535);
                    $this->hasColumn('thread_id', 'integer', 4);
                    $this->hasColumn('user_id', 'integer');
            }

            public function setUp() {

                    $this->actAs('Timestampable');
                    $this->hasOne('Thread', array('local' => 'thread_id','foreign' => 'id'));
                    $this->hasOne('User', array( 'local' => 'user_id', 'foreign' => 'id' ));
            }

    }
?>