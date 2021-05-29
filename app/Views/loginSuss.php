login in Susses
<?php $session = session();  ?>
<?php echo $session -> get('email')."歡迎".$session -> get('user');  ?> 