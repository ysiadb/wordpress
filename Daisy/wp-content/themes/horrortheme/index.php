<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php get_header(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-9">

            </div>
            <div class="col-12">
                <?php
                if (is_active_sidebar('zone-widgets-1')) :
                    dynamic_sidebar('zone-widgets-1');
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <?php get_footer(); ?>
        </div>
    </div>
</body>

</html>