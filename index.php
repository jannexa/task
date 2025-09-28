<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Task Manager</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .card {
      border-radius: 1.5rem;
      backdrop-filter: blur(12px);
      background: rgba(255, 255, 255, 0.85);
      box-shadow: 0 8px 30px rgba(0,0,0,0.15);
    }
    .btn-add {
      border-radius: 30px;
      padding: 0.5rem 1.3rem;
      font-weight: 500;
    }
    .table th {
      text-align: center;
    }
    .table td {
      vertical-align: middle;
      text-align: center;
    }
    .task-title {
      font-weight: 500;
      color: #333;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-10">

        <div class="card p-4 shadow-lg">
          <div class="card-body">
            <h2 class="text-center mb-4 fw-bold text-primary">✅ Task Manager</h2>

            <!-- Add Task -->
            <form action="insert.php" method="POST" class="d-flex mb-4">
              <input type="text" name="title" class="form-control me-2 rounded-pill" placeholder="Enter new task..." required>
              <button type="submit" class="btn btn-primary btn-add">+ Add</button>
            </form>

            <!-- Task List -->
            <div class="table-responsive">
              <table class="table table-hover table-bordered bg-white rounded-3 shadow-sm">
                <thead class="table-primary">
                  <tr>
                    <th style="width: 10%;">ID</th>
                    <th style="width: 45%;">Task</th>
                    <th style="width: 25%;">Created At</th>
                    <th style="width: 20%;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
                  if ($result->num_rows > 0):
                      while($row = $result->fetch_assoc()):
                  ?>
                    <tr>
                      <td><?= $row['id']; ?></td>
                      <td class="task-title"><?= htmlspecialchars($row['title']); ?></td>
                      <td><?= $row['created_at']; ?></td>
                      <td>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger rounded-pill px-3">❌ Delete</a>
                      </td>
                    </tr>
                  <?php 
                      endwhile;
                  else: 
                  ?>
                    <tr>
                      <td colspan="4" class="text-center text-muted">✨ No tasks yet. Add your first task above!</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
