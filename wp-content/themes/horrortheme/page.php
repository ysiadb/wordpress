<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
	<div class="row">
		<div class="container-fluid">
			<div class="col-12" style="background-color: black">
				<?php
				get_header();
				?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="container-fluid main_content">
			<div class="col-10">

				<div class="main_nav">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<h1><?php the_title(); ?></h1>

							<?php the_content(); ?>

					<?php endwhile;
					endif;
					?>

				</div>

			</div>
			<div class="col-2">

				<div class="SIDEBAR_Widget">
					<?php
					if (is_active_sidebar('zone-widgets-1')) :
						dynamic_sidebar('zone-widgets-1');
					endif;
					?>
				</div>



			</div>
		</div>
	</div>
	</div>
	<div class="row">
		<div class="col-12">
			<?php
			get_footer();

			?>
		</div>
	</div>
</body>

</html>