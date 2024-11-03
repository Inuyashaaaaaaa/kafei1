<?php require_once 'core/handleforms.php'; ?>
<?php require_once 'core/models.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coffee Category</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php $getcategorybyid = getcategorybyid($pdo, $_GET['category_id']); ?>

        <a href="index.php" class="btn btn-secondary mb-3">Return to Home</a>
        <h1>Edit Coffee Category</h1>

        <form action="core/handleForms.php?category_id=<?php echo $_GET['category_id']; ?>" method="POST" class="mt-4">
            <div class="form-group">
                <label for="category_name">Category Name:</label>
                <input type="text" name="category_name" class="form-control" value="<?php echo htmlspecialchars($getcategorybyid['category_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" class="form-control" rows="3" required><?php echo htmlspecialchars($getcategorybyid['description']); ?></textarea>
            </div>
            <button type="submit" name="editcategorybtn" class="btn btn-primary">Save Changes</button>
        </form>
    </div>
</body>
</html>
