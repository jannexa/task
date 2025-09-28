<?php
include("db.php");

$result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");

echo '<table class="table table-hover align-middle">';
echo '<thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Task</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
      </thead><tbody>';

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>{$row['created_at']}</td>
                <td><button onclick='deleteTask({$row['id']})' class='btn btn-sm btn-danger'>❌</button></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4' class='text-center text-muted'>No tasks yet</td></tr>";
}
echo "</tbody></table>";
