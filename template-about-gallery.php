<?php
    /*
    Template Name: About > Gallery
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

<main class="main-content-wrapper container" role="main">

    <section class="content-grid section-spacer">
        <article>
            <div class="post">
                <p><?php echo getField('introduction'); ?></p>
            </div>

            <div class="entry-content" itemprop="mainContentOfPage">
                <?php the_content(); ?>
            </div>
        </article>
    </section>

   
    <section>
        <header class="container"> 
            <h2>
                <?php echo getField('optional_subtitle'); ?>
            </h2>
        </header> 

        <div>
            <p><?php echo getFieldImage('image_1', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_2', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_3', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_4', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_5', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_6', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_7', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_8', '', 'medium'); ?></p>
            <p><?php echo getFieldImage('image_9', '', 'medium'); ?></p>
        </div>
    </section>
   


</main>




<?php get_footer(); ?>