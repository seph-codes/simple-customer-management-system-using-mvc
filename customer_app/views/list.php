<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Customers</title></head>
<body>
  <h2>Customer List</h2>
  <p><a href="index.php?action=new">Add New Customer</a></p>
  <table border="1" cellpadding="5">

<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>
    <?php foreach ($customers as $c): ?>
    <tr>
      <td><?= $c['id'] ?></td>
      <td><?= htmlspecialchars($c['name']) ?></td>
      <td><?= htmlspecialchars($c['email']) ?></td>
      <td><?= htmlspecialchars($c['phone']) ?></td>
    </tr>
    <?php endforeach ?>
  </table>
</body>
</html>