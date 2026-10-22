<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Customers</title></head>
<body>
  <h2>Customer List</h2>
  <?php if (isset($error)): ?>
    <p role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
  <?php endif; ?>
  <p><a href="index.php?action=new">Add New Customer</a></p>
  <p>
    <a href="index.php?action=reset"
      onclick="return confirm('Delete all customers? This cannot be undone.');">
      Reset All Customers
    </a>
  </p>
  <table border="1" cellpadding="5">

<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Actions</th></tr>
    <?php foreach ($customers as $c): ?>
    <tr>
      <td><?= (int)$c['id'] ?></td>
      <td><?= htmlspecialchars($c['name'], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?= htmlspecialchars($c['email'], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?= htmlspecialchars($c['phone'], ENT_QUOTES, 'UTF-8') ?></td>
      <td>
        <a href="index.php?action=edit&amp;id=<?= (int)$c['id'] ?>">Edit</a>
        <a href="index.php?action=delete&amp;id=<?= (int)$c['id'] ?>"
          onclick="return confirm('Delete this customer?');">Delete</a>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</body>
</html>