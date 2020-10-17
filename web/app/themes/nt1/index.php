<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,900;1,400&family=Open+Sans&display=swap" rel="stylesheet">
    <?php wp_head(); ?>

    <?php
    $theme = get_field('theme', 'options');
    ?>

    <style>
        :root {
            --theme-color-1: <?php echo $theme['color_1'] ?? '#f1525c' ?>;
            --theme-color-1-hover: <?php echo $theme['color_1_hover'] ?? '#f06770' ?>;
            --theme-color-2: <?php echo $theme['color_2'] ?? '#f2d36b' ?>;
            --theme-color-3: <?php echo $theme['color_3'] ?? '#465bf2' ?>;
            --theme-color-4: <?php echo $theme['color_4'] ?? '#1f1f21' ?>;
            --theme-color-5: <?php echo $theme['color_5'] ?? '#f0f0f0' ?>;
        }
    </style>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php do_action('get_header'); ?>

<div id="app">
    <?php echo \Roots\view(\Roots\app('sage.view'), \Roots\app('sage.data'))->render(); ?>
</div>

<?php do_action('get_footer'); ?>
<?php wp_footer(); ?>
</body>
</html>
