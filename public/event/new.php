<?php
require_once __DIR__.'/../partitions/header.php';
require_once __DIR__.'/../partitions/navbar.php';
$user = new User();
if(!$user->is_logedin()) {
    header('Location: '.'../user/login.php');
    exit();
}
?>


<div class="d-flex justify-content-center">
   <div class="mt-4">
   <div class="row"><h2 style="color:#fff;">Create New Event</h2></div>
    <div class="row mt-4">
        <form id="event" method="post" enctype="multipart/form-data">
            <div id="message"></div>
            <div class="form-group">
                <input type="text"  class="form-control" name="organiser_name" placeholder="organiser name" >
            </div>   
            <div class="form-group">
               <input type="text" class="form-control" name="title" placeholder="title" >
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Add description..."></textarea>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="event_email" placeholder="email" >
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="event_mobile"  placeholder="mobile" >
            </div>
            <div class="form-group">
                <textarea name="venue" class="form-control" cols="30" rows="10" placeholder="Add address..."></textarea>
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="banner" placeholder="venue" >
            </div>
            <div class="form-group">
                <input type="datetime-local" class="form-control" name="start_time" placeholder="venue" >
            </div>
            <div class="form-group">
                <input type="datetime-local" class="form-control" name="end_time" >
            </div>
            <div class="form-group">
                <small style="color:#495057;">
                    <input type="checkbox" name="accepted_policy"> I have read, understood, and accepted the PRIVACY POLICY for membership. Terms and Conditions
                </small>
            </div>
            <button type="submit" class="btn btn-primary" name="event_submit" value="submit">Submit</button>
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
        $("#event").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "event_submit.php",
                data: formData,
                processData: false,  
                contentType: false, 
                success: function(response) {
                    $("#event-message").html(response);
                }
            });
        });
    });
    </script>
</body>
</html>
