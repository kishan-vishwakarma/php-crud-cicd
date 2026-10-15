<?php
require_once 'db.php';

// Create table if not exists
$pdo->exec("CREATE TABLE IF NOT EXISTS tasks (id INT AUTO_INCREMENT PRIMARY KEY, title VARCHAR(255))");

// Add Task
if (isset($_POST['add_task']) && !empty($_POST['title'])) {
    $stmt = $pdo->prepare("INSERT INTO tasks (title) VALUES (?)");
    $stmt->execute([$_POST['title']]);
    header("Location: index.php");
    exit;
}

// Read Tasks
$tasks = $pdo->query("SELECT * FROM tasks ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head><title>CI/CD CRUD Test</title></head>
<body>
    <h2>Task Manager (CI/CD Demo)</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Enter task..." required>
        <button type="submit" name="add_task">Add</button>
    </form>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?= htmlspecialchars($task['title']) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>