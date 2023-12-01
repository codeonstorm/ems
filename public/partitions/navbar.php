<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= ROOT ?>"><?= WEBSITE_NAME ?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>event">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= ROOT ?>event/new.php">New Event</a>
            </li>
            <li class="nav-item">
                <?php if (User::is_logedin()) { ?>
                <a class="nav-link" href="<?= ROOT ?>user/signup.php">Signup</a><link rel="stylesheet" href="<?= ROOT ?>assets/css/main.css"/>
                <?php } else { ?>
                <a class="nav-link" href="<?= ROOT ?>user/login.php">Login</a>
                <?php } ?>
            </li>
        </ul>
    </div>
</nav>