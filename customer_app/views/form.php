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
    Name<br>
    <input type="text" name="name"
      value="<?= $customer['name'] ?? '' ?>" required><br><br>
    Email<br>
    <input type="email" name="email"
      value="<?= $customer['email'] ?? '' ?>" required><br><br>
    Phone<br>
    <input type="text" name="phone"
      value="<?= $customer['phone'] ?? '' ?>"><br><br>
    <button type="submit" name="add">Save</button>
  </form>
  <p><a href="index.php">Back to list</a></p>
</body>
</html>