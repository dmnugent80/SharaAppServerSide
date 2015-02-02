<?php
  $dbh=mysql_connect ("localhost", "username", "password") or die('Cannot connect to the database because: ' . mysql_error());
  mysql_select_db ("database_name");
  $sql=mysql_query("select * from table1");
  while($row=mysql_fetch_assoc($sql)) $output[]=$row;
  print(json_encode($output));
  mysql_close();
?>
