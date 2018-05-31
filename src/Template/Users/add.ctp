<?php
echo $this->Form->create("Users",array('url'=>'/users/addpost'));
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('Submit');
echo $this->Form->end();
?>