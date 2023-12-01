<?php
require_once __DIR__.'/../partitions/header.php';
require_once __DIR__.'/../partitions/navbar.php';
$events = new Event();
?>

<br><br>

<?php 
if (!$events->getEvents()) 
  die('<div class="d-flex justify-content-center"><p class="text-white">No Event...</p></div>');
foreach($events->getEvents() as $key=>$event) { 
?>
  <div class="event d-flex justify-content-center mb-4">
    <a href="<?= ROOT ?>event/card.php?uuid=<?= $event->uuid ?>" target="_blank">
    <div class="card mb-3 col-10">
      <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect><text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text></svg> -->
      <img class="mt-4" src="<?= ROOT ?>uploads/<?= $event->banner ?>" alt="" width="100%" height="180">
      <div class="card-body">
        <h5 class="card-title" style="color: #876e13"><?= $event->title ?></h5>
        <p class="card-text"><?= $event->description ?></p>
        <p class="card-text">venue: <br><?= $event->venue ?></p>
        <br>
        <p><b style="color: #876e13">Organized by:</b> <?= $event->organiser_name ?></p>
        <ul class="event__tagbox d-flex justify-content-start p-0">
          <li class="tag__item"><i class="fas fa-tag mr-2"></i>Podcast</li>
          <li class="tag__item"><i class="fas fa-eye mr-2"></i><?= $event->total_views ?></li>
          <li class="tag__item"><i class="fas fa-clock mr-2"></i><?= $event->start_time ?> - <?= $event->end_time ?></li>
          <li class="tag__item play blue">
            <a href="#"><i class="fas fa-plus mr-2"></i>Join Event</a>
          </li>
          <li class="tag__item share" onclick="shareEvent('<?= $event->uuid ?>')"><i class="fas fa-share mr-2"></i>Share</li>
        </ul>
        <p class="card-text"><small class="text-muted">Last updated <?= timeAgo($event->updated_at) ?></small></p>
      </div>
    </div>
    </a>
  </div>
<?php } ?>





 







 <!-- Add Bootstrap and jQuery scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
<script>
 function shareEvent(uuid) {
  window.open(`https://wa.me/?text=<?= ROOT ?>/event/${uuid}`);
  console.log(uuid);
 }
</script>
</body>
</html>
