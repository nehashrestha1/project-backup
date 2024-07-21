<?php require ('db.php');

session_start();
if (isset($_SESSION['email'])) {

} else {
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=index.php?msg=error\">";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Dashboard - Add Product</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.html">Fruitables</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.html">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="container mt-5">
        <h1 class="mb-4">Farmer Dashboard</h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Add New Product</h3>
                <form id="productForm">
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" placeholder="Enter product name"
                            required>
                    </div>
                    <!-- Category -->
                    <div class="mb-3">
                        <label for="productCategory" class="form-label">Category</label>
                        <select class="form-control" id="productCategory" required>
                            <option value="">Select Category</option>
                            <option value="vegetable">Vegetable</option>
                            <option value="fruit">Fruit</option>
                            <option value="dairy">Dairy Product</option>
                        </select>
                    </div>
                    <!-- Price -->
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Price (per unit)</label>
                        <input type="number" class="form-control" id="productPrice" placeholder="Enter price" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="productDescription" rows="3"
                            placeholder="Enter product description" required></textarea>
                    </div>
                    <!-- Image Upload -->
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="productImage" accept="image/*" required>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
            <!-- Products Section -->
        <div class="card mb-4">
            <div class="card-body">
                <h3 class="card-title">Your Products</h3>
                <div id="productsList">
                    <!-- Products will be dynamically loaded here -->
                </div>
            </div>
        </div>
        
        <!-- Orders Section -->
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Your Orders</h3>
                <div id="ordersList">
                    <!-- Orders will be dynamically loaded here -->
                </div>
            </div>
        </div>
        </div>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="./js/min.js"></script>
    <script>
        // Form submission handling
        $(document).ready(function () {
            $('#productForm').on('submit', function (e) {
                e.preventDefault();
                // Collect form data
                var formData = new FormData(this);

                // AJAX request to submit form data to the server
                $.ajax({
                    url: '/api/addProduct', // Replace with your backend endpoint
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        alert('Product added successfully!');
                        // Reset form
                        $('#productForm')[0].reset();
                    },
                    error: function (err) {
                        alert('Failed to add product. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>