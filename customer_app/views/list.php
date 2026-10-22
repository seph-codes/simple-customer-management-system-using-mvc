<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Customers</title></head>
<body>
  <h2>Customer List</h2>
  <?php if (isset($error)): ?>
    <p role="alert"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
  <?php endif; ?>
  <p><a href="index.php?action=new">Add New Customer</a></p>
  <form method="post" action="index.php"
    onsubmit="return confirm('Delete all customers? This cannot be undone.');">
    <button type="submit" name="reset">Reset All Customers</button>
  </form>
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
        <form method="post" action="index.php" style="display: inline"
          onsubmit="return confirm('Delete this customer?');">
          <input type="hidden" name="id" value="<?= (int)$c['id'] ?>">
          <button type="submit" name="delete">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
</body>
</html>