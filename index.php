<?php require('includes/header.php'); ?>

<body>

    <?php
                    $settings = "SELECT * FROM settings";
                    $s_result = mysqli_query($conn, $settings);
                    $logo = '';
                    $testi = '';

                    while ($s_data = mysqli_fetch_array($s_result)) {
                        if ($s_data['site_key'] == 'logo') {
                            $logo = $s_data['site_value'];
                        }
                        if ($s_data['site_key'] == 'testimonials_title') {
                            $testi = $s_data['site_value'];
                        }
                    }
                    ?>=======<?php
            $settings = "SELECT * FROM settings";
            $s_result = mysqli_query($conn, $settings);

            // Initialize variables to store individual data
            $logo = '';
            $testi = '';

            while ($s_data = mysqli_fetch_assoc($s_result)) {
                if ($s_data['site_key'] === 'logo') {
                    $logo = $s_data['site_value'];
                }
                if ($s_data['site_key'] === 'testi') {
                    $testi = $s_data['site_value'];
                }
            }
            ?>


        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <?php require('includes/navbar.php'); ?>

        <!-- Navbar End -->


        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Login</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="loginForm">
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="loginEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="loginPassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <small>Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal">Register here</a></small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Register Modal -->

        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registerModalLabel">Register</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="registerForm">
                            <div class="mb-3">
                                <label for="registerName" class="form-label">Name</label>
                                <input type="name" class="form-control" id="registerName" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerPhone" class="form-label">Phone</label>
                                <input type="phone" class="form-control" id="registerPhone" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerAddress" class="form-label">Address</label>
                                <input type="address" class="form-control" id="registerAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="registerEmail" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="registerEmail" required>
                            </div>
                            <div class="mb-3">
                                <label for="userRole" class="form-label">Register As</label>
                                <select class="form-select" id="userRole" required>
                                    <option value="" disabled selected>Select your role</option>
                                    <option value="farmer">Farmer</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>
                            <div id="farmerProofs" style="display: none;">
                                <div class="mb-3">
                                    <label for="farmProof" class="form-label">Farm Registration Proof</label>
                                    <input type="file" class="form-control" id="farmProof" accept="image/*,application/pdf">
                                </div>
                                <div class="mb-3">
                                    <label for="farmerPhoto" class="form-label">Farmer's Photo</label>
                                    <input type="file" class="form-control" id="farmerPhoto" accept="image/*">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="registerPassword" class="form-label">Password</label>
                                <input type="password" class="form-control" id="registerPassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirmPassword" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <small>Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login here</a></small>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">

                    <?php
                    $hero = "SELECT *FROM hero";
                    $hero_result = mysqli_query($conn, $hero);
                    $hero_data = mysqli_fetch_assoc($hero_result);


                    ?>
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary"><?php echo $hero_data['top_title']; ?></h4>
                        <h1 class="mb-5 display-3 text-primary"><?php echo $hero_data['title']; ?></h1>
                        <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div>
                    </div>
                    <!-- <div class="col-md-12 col-lg-5">
                    <?php
                    $query = "SELECT sliders.*, categories.title AS categories_title 
                            FROM sliders 
                            INNER JOIN categories 
                            ON sliders.category_id = categories.id";
                    $hero_result = mysqli_query($conn, $query);
                    ?>
                    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <?php

                            while ($slider = mysqli_fetch_assoc($hero_result)) {
                            ?>
                                <div class="carousel-item active">
                                    <img src="<?php echo 'admin/uploads/' . $slider['image'] ?>" class="d-block w-100" alt="...">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5><?php echo $slider['categories_title'] ?></h5>
                                        <p>Some representative placeholder content for the first slide.</p>
                                    </div>
                                </div>
                        </div>


                    <?php
                            }


                    ?>


                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> -->

                </div>
            </div>
        </div>
        </div>
        <!-- Hero End -->


        <!-- Fruits Shop Start -->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-2">
                                    <span class="text-dark" style="width: 130px;">Vegetables</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                    <span class="text-dark" style="width: 130px;">Fruits</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-4">
                                    <span class="text-dark" style="width: 130px;">Dairy Product</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <div class="row g-4">
                                        <div class="owl-carousel vegetable-carousel justify-content-center">

                                            <?php
                                            $categories = "SELECT *FROM products";
                                            $result = mysqli_query($conn, $categories);
                                            while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                                <div class="border border-primary rounded position-relative vesitable-item">
                                                    <div class="fruite-img">
                                                        <img src="<?php echo 'admin/uploads/' . $data['image']; ?>" class="img-fluid w-100 rounded-top" alt="">
                                                    </div>
                                                    <div class="p-4 rounded-bottom">
                                                        <h4><?php echo $data['title'] ?></h4>
                                                        <div class="description">
                                                            <p><?php echo $data['description'] ?></p>

                                                        </div>
                                                        <p class="text-dark fs-5 fw-bold mb-0">Rs <?php echo $data['price'] ?> /
                                                            kg</p>
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Add to
                                                            cart</a>
                                                    </div>
                                                </div>
                                            <?php
                                            }

                                            ?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Fruits Shop End-->




            <!-- Vesitable Shop Start-->
            <div class="container-fluid vesitable py-5">
                <div class="container py-5">
                    <h1 class="mb-0">Fresh Organic Products</h1>
                    <div class="owl-carousel vegetable-carousel justify-content-center">

                        <?php
                        $categories = "SELECT *FROM categories";
                        $result = mysqli_query($conn, $categories);
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="fruite-img">
                                    <img src="<?php echo 'admin/uploads/' . $data['image']; ?>" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="p-4 rounded-bottom">
                                    <h4><?php echo $data['title'] ?></h4>
                                    <div class="description">
                                        <p><?php echo $data['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
            <!-- Vesitable Shop End -->


            <!-- Vesitable Shop Start-->
            <div class="container-fluid vesitable pb-5">
                <div class="container py-5">
                    <h1 class="mb-0">Categories</h1>
                    <div class="owl-carousel vegetable-carousel justify-content-center">

                        <?php
                        $categories = "SELECT *FROM categories";
                        $result = mysqli_query($conn, $categories);
                        while ($data = mysqli_fetch_array($result)) {
                        ?>
                            <div class="border border-primary rounded position-relative vesitable-item">
                                <div class="fruite-img">
                                    <img src="<?php echo 'admin/uploads/' . $data['image']; ?>" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="p-4 rounded-bottom">
                                    <h4><?php echo $data['title'] ?></h4>
                                    <div class="description">
                                        <p><?php echo $data['description'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>
                    </div>

                </div>
            </div>
            <!-- Vesitable Shop End -->




            <!-- Fact Start -->
            <!-- Fact Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="bg-light p-5 rounded">
                <div class="row g-4 justify-content-center">
                    <?php
                    $facts = "SELECT *FROM facts";
                    $fact = mysqli_query($conn, $facts);
                    while ($fact_data = mysqli_fetch_array($fact)) {
                    ?>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="<?php echo $fact_data['icon']; ?>"></i>
                                <h4><?php echo $fact_data['title']; ?></h4>
                                <h1><?php echo $fact_data['number']; ?></h1>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Start -->
            <!-- Fact Start -->


            <!-- Tastimonial Start -->
            <div class="container-fluid testimonial py-5">
                <div class="container py-5">
                    <div class="testimonial-header text-center">
                        <h4 class="text-primary">Our Testimonial</h4>
                        <h1 class="display-5 mb-5 text-dark"><?php echo $testi ?></h1>
                    </div>
                    
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">
                                        <img src="img/aarti1.jfif" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="d-flex align-items-center flex-nowrap">
                                        <div class="bg-secondary rounded">
                                            <img src="<?php echo 'admin/uploads/' . $data['image']; ?>" class="img-fluid w-100 rounded-top" alt="">
                                        </div>
                                        <div class="ms-4 d-block">
                                            <h4 class="text-dark"><?php echo $data['name'] ?> </h4>
                                            <p class="m-0 pb-3"><?php echo $data['position'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item img-border-radius bg-light rounded p-4">
                            <div class="position-relative">
                                <i class="fa fa-quote-right fa-2x text-secondary position-absolute" style="bottom: 30px; right: 0;"></i>
                                <div class="mb-4 pb-4 border-bottom border-secondary">
                                    <p class="mb-0">Lorem Ipsum is simply dummy text of the printing Ipsum has been the
                                        industry's standard dummy text ever since the 1500s,
                                    </p>
                                </div>
                                <div class="d-flex align-items-center flex-nowrap">
                                    <div class="bg-secondary rounded">
                                        <img src="img/bi.jfif" class="img-fluid rounded" style="width: 100px; height: 100px;" alt="">
                                    </div>
                                    <div class="ms-4 d-block">
                                        <h4 class="text-dark">Binita Neupane</h4>
                                        <p class="m-0 pb-3">Profession</p>
                                        <div class="d-flex pe-5">
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                            <i class="fas fa-star text-primary"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Tastimonial End -->

        <?php require('includes/footer.php'); ?>