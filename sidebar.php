<div id="tribe-countdown-4104">							<div class="epta-countdown-timer">
								<div class="epta-countdown-cell">
									<div class="epta-countdown-number">15</div>
									<div class="epta-countdown-under">days</div>
								</div>
								<div class="epta-countdown-cell">
									<div class="epta-countdown-number">16</div>
									<div class="epta-countdown-under">hours</div>
								</div>
								<div class="epta-countdown-cell">
									<div class="epta-countdown-number">28</div>
									<div class="epta-countdown-under">min</div>
								</div>
								<div class="epta-countdown-cell">
									<div class="epta-countdown-number tecset-countdown-last">34</div>
									<div class="epta-countdown-under">sec</div>
								</div>
							</div>
							</div>





<?php
    // Inject helpers (injected on the header)
    // ....
    $template_slug = get_page_template_slug();
    $activePostCat = getCurrentPageSlug();

    // Sidebar is not needed on:
    if (!is_front_page()           // Front page template
    && !is_home()                  // Blog page
    && !is_search()                // Search page
    && !is_category()                // ...
    && !is_author()                // ...
    && !is_404()                // ...
    && $template_slug !== 'template-about.php'              // - About page templates               
    && $template_slug !== 'template-about-testimonials.php'      // - Testimonials page templates
    && $template_slug !== 'template-about-meet-the-team.php'     // - "Meet the founder" page templates
    && $template_slug !== 'template-events.php'                 // - "Events" listing page templates
    && $template_slug !== 'template-about-our-values.php'
    && $template_slug !== 'template-about-meet-the-fouder.php'
    && $template_slug !== 'template-about-gallery.php'
    && $template_slug !== 'template-grid-awards.php' ) {        // - Awards page templates
?>
    <aside class="sidebar bx-container" id="sidebar" role="complementary">
        <div id="primary" class="widget-area">
            <div class="content-wrapper">
                <?php 
                    // Services page template ...
                    if ($template_slug === 'template-events.php') { ?>
                        <?php include 'sidebar-template-events.php'; ?>
                <?php } 
                    // Contact page template ...
                    elseif ($template_slug === 'template-contact.php') { ?>
                        <?php include 'sidebar-template-contact.php'; ?>
                <?php } 
                    // Terms and policies page template ...
                    elseif ($template_slug === 'template-terms-and-policies.php') { ?>
                        <?php include 'sidebar-template-terms-and-policies.php'; ?>
                <?php } 
                    // Blog and article pages ...
                    elseif (is_single()) { ?>
                        <?php include 'sidebar-template-blog.php'; ?>
                <?php } 
                    // Any other pages ...
                    else { ?>
                        <?php include 'sidebar-template-blog.php'; ?>
                <?php } ?>
            </div>
        </div>
    </aside>
<?php
    }
?>
