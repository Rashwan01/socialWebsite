<div class="row widget-page">
	
	<aside class="sidebar">

		<div class="widget friend-list">
			<h4 class="widget-title">block List</h4>

			<ul id="people-list" class="friendz-list">

				<?php 
				$user = new users($conn,$data['username']);
				$user->blockingUser();
				
				?>


			</ul>

		</div><!-- friends list sidebar -->
	</aside>
</div>
