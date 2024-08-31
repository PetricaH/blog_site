<?php include('config.php'); ?>
<?php include('includes/public_functions.php'); ?>
<?php 
    if (isset($_GET['post_slug'])) {
        $artwork = getArtworkById($_GET['art-id']); // fetch artwork by ID
    }
    $categories = getAllCategories(); // fetch all the categories
?>
<?php include('includes/head_section.php'); ?>
<title><?php echo $artwork['name'] ?> | ArtGallery</title>
</head>
<body>
    <div class="container">
        <!-- navbar -->
        <?php include( ROOT_PATH . '/includes/navbar.php'); ?>
        <!-- // navbar -->
        <div class="content">
            <!-- page wrapper -->
            <div class="post-wrapper">
                <!-- full artwork div -->
                <div class="full-post-div">
                    <?php if ($art['published'] == false): ?>
                        <h2 class="post-title">Sorry... this artwork has not been published</h2>
                    <?php else: ?>
                        <h2 class="post-title"><?php echo $artwork['name']; ?></h2>
                        <div class="post-body-div">
                            <img src="<?php echo BASE_URL . '/static/images/' . $artwork['image']; ?>" alt="<?php echo $artwork['name']; ?>" class="full-post-image">
                            <p><?php echo $artwork['description']; ?></p>
                        </div>
                    <?php endif ?>
                </div>
                <!-- // full artwork div -->
            </div>
            <!-- // page wrapper -->
            <!-- sidebar for categories -->
            <div class="post-sidebar">
                <div class="card">
                    <div class="card-header">
                        <h2>Categories</h2>
                    </div>
                    <div class="card-content">
                        <?php foreach ($categories as $category): ?>
                            <a href="<?php echo BASE_URL . 'filtered_art.php?category=' . $category['id'] ?>">
                                <?php echo $category['title']; ?>
                            </a>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!-- // sidebar for categories -->
        </div>
    </div>
    <!-- // content -->
<?php include( ROOT_PATH . '/includes/footer.php'); ?>