<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Customers</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet">
</head>
<body>
  <main class="container py-4">
    <div class="row">
      <div class="col-12">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
          <h1 class="h2 mb-0">Customer List</h1>
          <div class="d-flex flex-wrap gap-2">
            <a class="btn btn-primary" href="index.php?action=new">Add New Customer</a>
            <a class="btn btn-outline-danger" href="index.php?action=reset"
              onclick="return confirm('Delete all customers? This cannot be undone.');">
              Reset All
            </a>
          </div>
        </div>

        <?php if (isset($error)): ?>
          <div class="alert alert-danger" role="alert">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-light">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($customers)): ?>
                <tr>
                  <td class="text-center text-muted py-4" colspan="5">No customers found.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($customers as $c): ?>
                  <tr>
                    <td><?= (int)$c['id'] ?></td>
                    <td><?= htmlspecialchars($c['name'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($c['email'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($c['phone'], ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                      <div class="d-flex flex-wrap gap-2">
                        <a class="btn btn-sm btn-outline-primary"
                          href="index.php?action=edit&amp;id=<?= (int)$c['id'] ?>">Edit</a>
                        <a class="btn btn-sm btn-outline-danger"
                          href="index.php?action=delete&amp;id=<?= (int)$c['id'] ?>"
                          onclick="return confirm('Delete this customer?');">Delete</a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
