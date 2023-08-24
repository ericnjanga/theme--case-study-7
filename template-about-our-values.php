<?php
    /*
    Template Name: About > Our Values
    */ 
    get_header();
?>

<header class="hero">
    <div class="container">
        <div class="text-wrapper">
            <h1 class="hero-title"><?php echo getField('optional_title'); ?></h1>
            <section class="breadcrumb">
                <?php displayBreadcrumbs(); ?>
            </section>
            <?php edit_post_link(); ?>
        </div>
    </div>
</header>

<main class="main-content-wrapper" role="main"> 
    <header class="container"> 
        <h2>
            <?php echo getField('optional_subtitle'); ?>
        </h2>
    </header> 
    

    <section class="section-highlight container">   
        <div>
            <h3 class="section-subtitle"><?php echo getField('value_1_title'); ?></h3>
            <p class="section-content"><?php echo getField('value_1_paragraph'); ?></p>
            <?php
                echo getFieldImage('value_1_image', '', 'medium');
            ?>
        </div>
        <div>
            <h3 class="section-subtitle"><?php echo getField('value_2_title'); ?></h3>
            <p class="section-content"><?php echo getField('value_2_paragraph'); ?></p>
            <?php
                echo getFieldImage('value_2_image', '', 'medium');
            ?>
        </div>
        <div>
            <h3 class="section-subtitle"><?php echo getField('value_3_title'); ?></h3>
            <p class="section-content"><?php echo getField('value_3_paragraph'); ?></p>
            <?php
                echo getFieldImage('value_3_image', '', 'medium');
            ?>
        </div>
    </section>




    <section class="parallax-section">
        <blockquote>
            ...
        </blockquote>
    </section>





    <section class="section-spacer container">
        <h2 class="h-underlined">Don’t take our word for it...</h2>
        <div>
            <?php displayTestimonial('grid grid-11233 testimonial-list', 3, true); ?>
        </div>
    </section>



   
</main>

<?php get_footer(); ?>