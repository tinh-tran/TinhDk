<nav class="navbar navbar-light bg-faded">
	<form class="form-inline" method="get" action="<?php echo home_url( '/' ) ?>">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search for..." name="q" id="search" value="<?php echo get_search_query(); ?>">
			<span class="input-group-btn">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit" id="searchsubmit" value="<?php esc_attr_e('Search', 'bs-4-wp') ?>">
					<i class="fa fa-search" aria-hidden="true"></i>
				</button>
			</span>
		</div>
	</form>
</nav>