<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>
  <?= isset($customer) ? 'Edit' : 'Add' ?> Customer
</title></head>
<body>
  <h2>
    <?= isset($customer) ? 'Edit' : 'Add New' ?> Customer
  </h2>
  <form method="post" action="index.php">
    <?php if (isset($customer)): ?>
      <input type="hidden" name="id" value="<?= (int)$customer['id'] ?>">
    <?php endif; ?>
    Name<br>
    <input type="text" name="name"
      value="<?= htmlspecialchars($customer['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required><br><br>
    Email<br>
    <input type="email" name="email"
      value="<?= htmlspecialchars($customer['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required><br><br>
    Phone<br>
    <input type="text" name="phone"
      value="<?= htmlspecialchars($customer['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>"><br><br>
    <?php if (isset($customer)): ?>
      <button type="submit" name="update">Update</button>
    <?php else: ?>
      <button type="submit" name="add">Save</button>
    <?php endif; ?>
  </form>
  <p><a href="index.php">Back to list</a></p>
</body>
</html>