<link rel="stylesheet" type="text/css" href="/assets/css/style10.css">
<div class="container">

<?php
if($the_events){
	foreach ($the_events as $value)
	{
	?>
		
<h3><?php echo $value['event_title']; ?></h3>
<br>

<div class="row">
	<div class="col-md-9">
	<h4>About the event</h4>
		<p id="description"><?php echo $value['event_description']; ?></p>
		<hr>
	</div>

	<div class="col-md-3">
		<h4>Details</h4>
		<p>Location: <?php echo $value['event_location']; ?></p>
		<p>When: <?php $date = new DateTime($value['event_datetime']);
		$dateEvent = $date->format('d-m-Y'); echo $dateEvent; ?></p>
		<p>Price: € <?php echo $value['event_price']; ?></p>
	</div>
</div>
<?php
	}
}
?>
</div>