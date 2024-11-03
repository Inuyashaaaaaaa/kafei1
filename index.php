<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center mb-4">Coffee Category Management</h1>
        <!-- Form to add a new category -->
        <form action="core/handleforms.php" method="POST" class="mb-4">
            <div class="form-row">
                <div class="col-md-5 mb-3">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" name="category_name" placeholder="Enter category name" required>
                </div>
                <div class="col-md-5 mb-3">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" name="description" placeholder="Enter description" required>
                </div>
                <div class="col-md-2 align-self-end">
                    <button type="submit" class="btn btn-primary btn-block" name="insertcategorybtn">Add Category</button>
                </div>
            </div>
        </form>

        <!-- Display list of categories as cards -->
        <div class="row">
            <?php $getallcategories = getallcategories($pdo); ?>
            <?php foreach ($getallcategories as $row) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Category: <?php echo $row['category_name']; ?></h5>
                            <p class="card-text"><?php echo $row['description']; ?></p>
                        </div>
                        <div class="card-footer text-right">
                            <a href="view_variants.php?category_id=<?php echo $row['category_id']; ?>" class="btn btn-info btn-sm">View Variants</a>
                            <a href="edit_category.php?category_id=<?php echo $row['category_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete_category.php?category_id=<?php echo $row['category_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>
