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
                        <form id="taskForm" class="d-flex mb-4">
                            <input type="text" id="title" name="title" class="form-control me-2" placeholder="Enter new task" required>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                        <!-- Task List -->
                        <div id="taskTable" class="table-responsive">
                            <!-- Task list loads here -->
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
    // Load tasks initially
    function loadTasks() {
        fetch("fetch.php")
            .then(res => res.text())
            .then(data => {
                document.getElementById("taskTable").innerHTML = data;
            });
    }

    // Handle Add Task
    document.getElementById("taskForm").addEventListener("submit", function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        fetch("insert.php", {
            method: "POST",
            body: formData
        })
        .then(() => {
            this.reset();
            loadTasks(); // refresh task list
        });
    });

    // Handle Delete Task
    function deleteTask(id) {
        fetch("delete.php?id=" + id)
            .then(() => loadTasks());
    }

    // Load tasks every 3 seconds (simulate real-time)
    setInterval(loadTasks, 3000);

    // Initial load
    loadTasks();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
