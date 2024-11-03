<?php  
function insertcategory($pdo, $category_name, $description) {
    $sql = "INSERT INTO coffee_categories (category_name, description) VALUES (?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$category_name, $description]);
}

function getallcategories($pdo) {
    $sql = "SELECT * FROM coffee_categories";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll() ?: [];
}

function updatecategory($pdo, $category_name, $description, $category_id) {
    $sql = "UPDATE coffee_categories SET category_name = ?, description = ? WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$category_name, $description, $category_id]);
}

function deletecategory($pdo, $category_id) {
    // First delete all variants in this category
    $deleteVariants = "DELETE FROM coffee_variants WHERE category_id = ?";
    $deleteStmt = $pdo->prepare($deleteVariants);
    $deleteStmt->execute([$category_id]);
    
    // Now delete the category
    $sql = "DELETE FROM coffee_categories WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$category_id]);
}

function getvariantsbycategory($pdo, $category_id) {
    $sql = "SELECT 
                v.variant_id,
                v.variant_name,
                v.description,
                v.price,
                c.category_name
            FROM coffee_variants v
            JOIN coffee_categories c ON v.category_id = c.category_id
            WHERE v.category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);
    return $stmt->fetchAll() ?: [];
}

function getcategorybyid($pdo, $category_id) {
    $sql = "SELECT * FROM coffee_categories WHERE category_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$category_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
}

function insertvariant($pdo, $variant_name, $description, $price, $category_id) {
    $sql = "INSERT INTO coffee_variants (variant_name, description, price, category_id) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$variant_name, $description, $price, $category_id]);
}

function deletevariant($pdo, $variant_id) {
    $sql = "DELETE FROM coffee_variants WHERE variant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$variant_id]);
}

function updatevariant($pdo, $variant_name, $description, $price, $variant_id) {
    $sql = "UPDATE coffee_variants 
            SET variant_name = ?, description = ?, price = ?
            WHERE variant_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$variant_name, $description, $price, $variant_id]);
}

function getvariantbyid($pdo, $variant_id) {
    $sql = "SELECT * FROM coffee_variants WHERE variant_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$variant_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: false;
}
?>
