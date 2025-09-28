<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body">
                        <h3 class="text-center mb-4">✅ Task Manager</h3>

                        <!-- Add Task -->
                        <form action="insert.php" method="POST" class="d-flex mb-4">
                            <input type="text" name="title" class="form-control me-2" placeholder="Enter new task" required>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                        <!-- Task List -->
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>ID</th>
                                        <th>Task</th>
                                        <th>Created At</th>
                                        <th>Action</th>
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
                                        <td><?= htmlspecialchars($row['title']); ?></td>
                                        <td><?= $row['created_at']; ?></td>
                                        <td>
                                            <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger">❌</a>
                                        </td>
                                    </tr>
                                <?php 
                                    endwhile;
                                else: 
                                ?>
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No tasks yet</td>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
