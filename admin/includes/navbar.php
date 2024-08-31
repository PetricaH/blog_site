<div class="header">
        <div class="logo">
                <a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
                        <h1>Hreniuc Petrică - Admin</h1>
                </a>
        </div>
        <?php if (isset($_SESSION['user'])): ?>
            <div class="user-info">
                <span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp;
                <a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
            </div>
        <?php endif ?>
</div>