<!doctype html>
<html lang="ru">

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<!--    <link rel="shortcut icon" href="--><?php //echo get_template_directory_uri(); ?><!--/img/favicons/favicon.ico" type="image/ico">-->
    <title><?php the_title();?></title>
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>


<body <?php body_class(); ?> >
<?php //get_template_part('template-parts/components', 'preloader'); ?>
<?php get_template_part('template-parts/components', 'menu'); ?>
    <!--START TOP AREA-->
