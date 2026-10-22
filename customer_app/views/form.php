<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= isset($customer) ? 'Edit' : 'Add' ?> Customer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">
</head>
<body>
  <main class="container py-4">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <h1 class="h2 mb-4">
          <?= isset($customer) ? 'Edit' : 'Add New' ?> Customer
        </h1>

        <form method="post" action="index.php" class="row g-3">
          <?php if (isset($customer)): ?>
            <input type="hidden" name="id" value="<?= (int)$customer['id'] ?>">
          <?php endif; ?>
          <div class="col-12">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text" id="name" name="name"
              value="<?= htmlspecialchars($customer['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" id="email" name="email"
              value="<?= htmlspecialchars($customer['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
          </div>
          <div class="col-12 col-md-6">
            <label class="form-label" for="phone">Phone</label>
            <input class="form-control" type="text" id="phone" name="phone"
              value="<?= htmlspecialchars($customer['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
          </div>
          <div class="col-12 d-flex flex-wrap gap-2">
            <?php if (isset($customer)): ?>
              <button class="btn btn-primary" type="submit" name="update">Update</button>
            <?php else: ?>
              <button class="btn btn-primary" type="submit" name="add">Save</button>
            <?php endif; ?>
            <a class="btn btn-outline-secondary" href="index.php">Back to list</a>
          </div>
        </form>
      </div>
    </div>
  </main>
</body>
</html>
