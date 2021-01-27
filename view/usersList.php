<?php
$users = $_REQUEST['users'];
?>;
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Implementando MVC</title>
  </head>
  <body>
    <table>
      <tr>
        <th>ID</th>
        <th>User</th>
      </tr>
      <?php foreach ($users as $user): ?>
      <tr>
        <td><?php echo $user->getId(); ?></td>
        <td><?php echo $user->getNome(); ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </body>
</html>