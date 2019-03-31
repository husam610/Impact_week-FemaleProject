
<link rel="stylesheet" type="text/css" href="/assets/css/style9.css">
<div class="container">
<h3>UPCOMING EVENTS</h3>
<p id="description">Female Ventures hosts and co-hosts a variety of events. At these events, we offer a platform to female leaders, entrepreneurs and role models. We stimulate people to meet and exchange ideas. Our events are open to everyone and at low cost.  Choosing a € 5.00 per person entrance fee came about as a result of your feedback. We learnt that you prefer a ‘per event’ fee rather than a full year membership fee. The fee contributes towards catering (drinks & nibbles) & some of our organizational costs like the hosting of our website & marketing. On occasion we do receive sponsorships, but it does not cover all of our costs.</p>
<div class="row">
<?php
if($all_events){
foreach ($all_events as $value)
{
?>
	<div class="col-sm-6" id="col">
		<?php echo $value['event_title']; ?>
		<hr>
		<img src="/assets/images/event1.jpg" alt="event photo">
		<form method="post" action="get_event">
			<input type="hidden" name="event_id" value="<?php echo $value['event_id']; ?>">
			<input type="submit" value ="Check event" id="btn2" class="btn btn-info">
		</form>
		<br>
		<br>
	</div>

<?php
}
}
?>

</div>