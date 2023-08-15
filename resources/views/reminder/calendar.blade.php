@extends('layouts.app')

@section('content')


		<div class="calendar-env">

			<!-- Calendar Body -->
			<div class="calendar-body">

				<div id="calendar"></div>


			</div>

			<!-- Sidebar -->
			<div class="calendar-sidebar">

				<!-- new task form -->
				<div class="calendar-sidebar-row">

					<form role="form" id="add_event_form">

						<div class="input-group minimal" id="add_event_inp1">
							<input type="text" class="form-control" placeholder="Add event..." />

							<div class="input-group-addon">
								<i class="entypo-pencil"></i>
							</div>
						</div><br>
                        <div class="input-group minimal" id="add_event_inp2">
							<input type="time" class="form-control" placeholder="Add time..." />

							<div class="input-group-addon">
								<i class="entypo-pencil"></i>
							</div>
						</div>

					</form>

				</div>


				<!-- Events List -->
				<ul class="events-list" id="draggable_events">
					<li>
						<p>Drag Events to Calendar Dates</p>
					</li>
					<li>
						<a href="#">Sport Match</a>
					</li>
					<li>
						<a href="#" class="color-blue" data-event-class="color-blue">Meeting</a>
					</li>
					<li>
						<a href="#" class="color-orange" data-event-class="color-orange">Relax</a>
					</li>
					<li>
						<a href="#" class="color-primary" data-event-class="color-primary">Study</a>
					</li>
					<li>
						<a href="#" class="color-green" data-event-class="color-green">Family Time</a>
					</li>
				</ul>

			</div>

		</div>

		<hr />
        <!-- Bottom scripts (common) -->
	<script src="assets/js/gsap/TweenMax.min.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>


	<!-- Imported scripts on this page -->
	<script src="assets/js/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/js/neon-calendar.js"></script>
	<script src="assets/js/neon-chat.js"></script>

@endsection
