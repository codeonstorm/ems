<?php
require_once __DIR__.'/partitions/header.php';
require_once __DIR__.'/partitions/navbar.php';
?>
    

<!-- Hero Section -->
<header class="hero mt-2">
    <div class="container text-center mt-4">
        <h1 class="text-success">Welcome to Our Event Management System</h1>
        <p class="text-success">Discover and attend amazing events in your city</p>
        <a href="<?= ROOT ?>event" class="btn btn-primary" style="margin:60px auto;">Explore Events</a>
    </div>
</header>

<!-- Featured Events Section -->
<section class="featured-events">
    <div class="container">
        <h2 class="text-center">Featured Events</h2>
        <!-- Add your featured event cards here -->
    </div>
</section>

 

<?php
require_once __DIR__.'/partitions/footer.php';
?>

    <!-- Add Bootstrap and jQuery scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
