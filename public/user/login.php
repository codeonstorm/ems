<?php
require_once __DIR__.'/../partitions/header.php';
require_once __DIR__.'/../partitions/navbar.php';
?>
 
<div class="d-flex justify-content-center">
   <div class="mt-4">
   <div class="row"><h2 style="color:#fff;">Login</h2></div>
    <div class="row mt-4">
        <form id="login" method="post">
            <div id="message"></div>
            <div class="form-group">
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>   
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Enter password">
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>

   </div>
</div>

 <!-- Add Bootstrap and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
        // Login
        $("#login").submit(function(e) {
            e.preventDefault();
            var email = $("#email").val();
            var password = $("#password").val();
            
            $.ajax({
                type: "POST",
                url: "auth.php",
                data: {
                    email: email,
                    password: password,
                    type: 'login'
                },
                success: function(response) {
                    $("#login-message").html(response);
                    window.location.href = '<?= ROOT ?>/event/new.php';
                }
            });
        });
    });
    </script>
</body>
</html>
