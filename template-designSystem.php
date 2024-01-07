<?php
    /*
    Template Name: Design System Template
    */ 
    get_header();
?>

 <?php
		  
		   $custom_logo_id = get_theme_mod( 'custom_logo' );
          $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
		 
		  ?>


  <nav class="navbar fixed-top navbar-expand-lg bg-primary">
    <div class="container">

      <a href="<?php echo get_bloginfo('url'); ?>" class="navbar-brand d-flex mr-auto">
        <img class="tenverto-logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="Tenverto by Eric Njanga">
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse"
        data-target="#tenverto-designSys-nav-collapse">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="tenverto-designSys-nav-collapse">
        <ul class="nav navbar-nav ml-auto w-100 justify-content-end">
          <li class="nav-item">
            <a class="nav-link text-icon icon-before icon-linkedIn" href="<?php echo get_bloginfo('url'); ?>">Back to main site</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link active" aria-current="page" href="#">Buttons</a> -->
            <a class="nav-link" href="#section-typography">Typography</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#section-buttons">Buttons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#section-links">Links</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#section-icons">Icons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#section-spacing">Spacing</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Components
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#section-components-testimonial">Testimonial</a></li>
              <li><a class="dropdown-item" href="#section-components-casestudy">Case Study</a></li>
              <li><a class="dropdown-item" href="#section-components-expertise">Expertise</a></li>
              <li><a class="dropdown-item" href="#section-components-article">Article</a></li>
              <!-- <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Component 3</a></li> -->
            </ul>
          </li>
        </ul>
        <!-- <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
      </div>
    </div>
  </nav>










  <header class="hero gap-top-margin gap-bottom-margin">
    <div class="container">
      <h1 class="gap-bottom-margin-4th">Design System</h1>
      <p class="txt-large section-max-w2 section-h-centering gap-bottom-margin">Lorem ipsum dolor sit, amet consectetur
        adipisicing elit. Id repellendus laboriosam aliquam at ea voluptas numquam nesciunt, similique pariatur
        laudantium. Repudiandae minus error sint incidunt autem nisi, debitis eos quo.</p>
    </div>
  </header>



  <section class="container">

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-typography" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Typography
          </h2>

          <div class="card p-4">
            <div class="row">
              <div class="col">
                <h1>h1: text</h1>
                <h2>h2: text</h2>
                <h3>h3: text</h3>
                <h4>h4: text</h4>
                <h5>h5: text</h5>

                <div class="mt-2">
                  <span class="badge bg-secondary">Small Text</span>
                  <p class="txt-small">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem tempora et vel.
                    Perferendis harum doloremque officia voluptatum, nulla dolores a animi, in praesentium laborum illo
                    nostrum pariatur expedita consequuntur nisi.</p>
                </div>

                <div class="mt-2">
                  <span class="badge bg-secondary">Normal Text</span>
                  <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem tempora et vel. Perferendis harum
                    doloremque officia voluptatum, nulla dolores a animi, in praesentium laborum illo nostrum pariatur
                    expedita consequuntur nisi.</p>
                </div>

                <div class="mt-2">
                  <span class="badge bg-secondary">Large Text</span>
                  <p class="txt-large">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quidem tempora et vel.
                    Perferendis harum doloremque officia voluptatum, nulla dolores a animi, in praesentium laborum illo
                    nostrum pariatur expedita consequuntur nisi.</p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

    </div>

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-buttons" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Buttons
          </h2>

          <div class="card p-4">
            <div class="row mb-3">
              <div class="col">
                <p class="m-0">Primary</p>
                <a target="_blank" href="#" class="btn btn-primary">Lorem Ipsum</a>
              </div>
              <div class="col">
                <p class="m-0">Secondary</p>
                <a target="_blank" href="#" class="btn btn-secondary">Lorem Ipsum</a>
              </div>
              <div class="col">
                <p class="m-0">With icon (before)</p>
                <a target="_blank" href="#" class="btn btn-secondary text-icon icon-before icon-linkedIn">Lorem
                  Ipsum</a>
              </div>
              <div class="col">
                <p class="m-0">With icon (after)</p>
                <a target="_blank" href="#" class="btn btn-secondary text-icon icon-after icon-linkedIn">Lorem
                  Ipsum</a>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <p class="m-0">Primary - large</p>
                <a target="_blank" href="#" class="btn btn-primary btn-lg">Lorem Ipsum</a>
              </div>
              <div class="col">
                <p class="m-0">Secondary - large</p>
                <a target="_blank" href="#" class="btn btn-secondary btn-lg">Lorem Ipsum</a>
              </div>
              <div class="col">
                <p class="m-0">With icon - large (before)</p>
                <a target="_blank" href="#" class="btn btn-secondary btn-lg text-icon icon-before icon-linkedIn">Lorem
                  Ipsum</a>
              </div>
              <div class="col">
                <p class="m-0">With icon - large (after)</p>
                <a target="_blank" href="#" class="btn btn-secondary btn-lg text-icon icon-after icon-linkedIn">Lorem
                  Ipsum</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-links" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Links
          </h2>



          <div class="card p-4">
            <div class="row">
              <div class="col">
                <div class="alert alert-primary text-center" role="alert">
                  These styles can be combined.
                </div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <p class="m-0">link-underlined</p>
                <a href="#" class="link-underlined">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Perspiciatis suscipit neque accusantium, amet nihil alias soluta necessitatibus blanditiis consectetur
                  laborum autem quaerat aspernatur, tenetur libero repellat, eum fuga et dolorem.</a>
              </div>
              <div class="col">
                <p class="m-0">link-not-underlined</p>
                <a href="#" class="link-not-underlined">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  Perspiciatis suscipit neque accusantium, amet nihil alias soluta necessitatibus blanditiis consectetur
                  laborum autem quaerat aspernatur, tenetur libero repellat, eum fuga et dolorem.</a>
              </div>
              <div class="col">
                <p class="m-0">link-color-hover1</p>
                <a href="#" class="link-color-hover1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis
                  suscipit neque accusantium, amet nihil alias soluta necessitatibus blanditiis consectetur laborum
                  autem quaerat aspernatur, tenetur libero repellat, eum fuga et dolorem.</a>
              </div>
              <div class="col">
                <p class="m-0">link-color-hover2</p>
                <a href="#" class="link-color-hover2">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis
                  suscipit neque accusantium, amet nihil alias soluta necessitatibus blanditiis consectetur laborum
                  autem quaerat aspernatur, tenetur libero repellat, eum fuga et dolorem.</a>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col">
                <p class="m-0">With icon (before)</p>
                <a href="#" class="text-icon icon-before icon-linkedIn">Lorem ipsum dolor sit amet consectetur
                  adipisicing elit. Eius, quos? Sunt, sint nihil laboriosam excepturi dolores possimus, reiciendis
                  dolorem porro nobis quia, quis dolore mollitia inventore? Enim quas accusantium aliquid.</a>
              </div>
              <div class="col">
                <p class="m-0">With icon (after)</p>
                <a href="#" class="text-icon icon-after icon-linkedIn">Lorem ipsum dolor sit amet consectetur
                  adipisicing elit. Eius, quos? Sunt, sint nihil laboriosam excepturi dolores possimus, reiciendis
                  dolorem porro nobis quia, quis dolore mollitia inventore? Enim quas accusantium aliquid.</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-icons" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Icons
          </h2>

          <div class="card p-4">
            <div class="row mb-3">
              <div class="col">
                <p class="m-0 txt-small">icon-linkedIn</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-linkedIn">
                  <span class="visually-hidden">LinkedIn icon</span>
                </span>
              </div>
              <div class="col">
                <p class="m-0 txt-small">icon-pin</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-pin">
                  <span class="visually-hidden">Pin icon</span>
                </span>
              </div>
              <div class="col">
                <p class="m-0 txt-small">icon-link</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-link">
                  <span class="visually-hidden">Link icon</span>
                </span>
              </div>
              <div class="col">
                <p class="m-0 txt-small">icon-text</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-text">
                  <span class="visually-hidden">Text icon</span>
                </span>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col">
                <p class="m-0 txt-small">icon-suitcase</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-suitcase">
                  <span class="visually-hidden">Suitcase icon</span>
                </span>
              </div>
              <div class="col">
                <p class="m-0 txt-small">icon-rocket-takeoff</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-rocket-takeoff">
                  <span class="visually-hidden">Rocket icon</span>
                </span>
              </div>
              <div class="col">
                <p class="m-0 txt-small">icon-box-arrow-up-right</p>
                <span target="_blank" href="#" class="text-icon icon-after icon-box-arrow-up-right">
                  <span class="visually-hidden">Box arrow right icon</span>
                </span>
              </div>
              <div class="col">
                <p class="m-0 txt-small">...</p>
                <!-- <span target="_blank" href="#" class="text-icon icon-after icon-rocket-takeoff">
                    <span class="visually-hidden">Rocket icon</span>
                  </span> -->
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-spacing" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Spacing
          </h2>

          <div class="card p-4">
            <div class="row mb-3">
              <div class="col">
                <div class="border p-2 bg-secondary mb-3">
                  <div class="gap-top-margin bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-top-margin</p>
                  </div>
                </div>

                <div class="border p-2 bg-secondary mb-3">
                  <div class="gap-top-margin-2th bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-top-margin-2th</p>
                  </div>
                </div>

                <div class="border p-2 bg-secondary mb-3">
                  <div class="gap-top-margin-4th bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-top-margin-4th</p>
                  </div>
                </div>

                <div class="border p-2 bg-secondary">
                  <div class="gap-top-margin-5th bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-top-margin-5th</p>
                  </div>
                </div>
              </div>

              <div class="col">
                <div class="border p-2 bg-secondary mb-3">
                  <div class="gap-bottom-margin bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-bottom-margin</p>
                  </div>
                </div>

                <div class="border p-2 bg-secondary mb-3">
                  <div class="gap-bottom-margin-2th bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-bottom-margin-2th</p>
                  </div>
                </div>

                <div class="border p-2 bg-secondary mb-3">
                  <div class="gap-bottom-margin-4th bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-bottom-margin-4th</p>
                  </div>
                </div>

                <div class="border p-2 bg-secondary">
                  <div class="gap-bottom-margin-5th bg-info">
                    <p class="m-0 p-1 bg-info txt-small">gap-bottom-margin-5th</p>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-components-testimonial" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Testimonial
          </h2>

          <div class="card card-testimonial gap-bottom-margin-4th">
            <img class="card-testimonial__img"
              src="https://media.istockphoto.com/id/1126614847/photo/portrait-of-businessman-smiling-over-gray-background.jpg?s=612x612&w=0&k=20&c=Xxh81QLknMjHPpqgqY8j8vS46kWHhWm7yUYgHZ_AReU="
              class="img-fluid" alt="image 8" />
            <div class="card-testimonial__description">
              <div class="card-body">
                <h5 class="card-title">First, last name</h5>
                <h6 class="card-subtitle">
                  Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, quibu ntium incidu eos.
                </h6>
                <div class="card-text">
                  <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, quibusdam magnam. Exercitationem
                    obcaecati quia, iusto laudantium incidunt, earum porro asperiores dignissimos non aspernatur
                    suscipit consequuntur saepe tempora eius deserunt eos. Lorem ipsum dolor sit amet consectetur,
                    adipisicing elit. Accusantium a nihil ut repellat, in molestiae ex excepturi eligendi inventore,
                    architecto rerum pariatur. Error, aut harum quam iste quia ab non. Lorem ipsum dolor sit amet
                    consectetur adipisicing elit. Similique optio aspernatur obcaecati a doloremque cupiditate, debitis
                    cumque et numquam, quia modi vitae? Non fugit vero mollitia, corrupti repellendus veritatis ...
                  </p>
                </div>
                <footer class="card-footer">
                  <button type="button" class="btn btn-primary text-icon icon-after icon-box-arrow-up-right"
                    data-bs-toggle="modal" data-bs-target="#modal-testimonial-1">
                    See more
                  </button>
                </footer>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row mb-5">
      <div class="col">
        <div class="pos-relative">
          <span id="section-components-casestudy" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Case Study
          </h2>

          <div class="case-study">
            <a href="/case-study-single.html">
              <img class="card-img-top case-study__img"
                src="https://media.istockphoto.com/id/1267383747/vector/smartphone-interface-vector-template.jpg?s=2048x2048&w=is&k=20&c=ECkozC0-QADdghC05Z6wmYzGHUtJO6q-EYkVgLdBi3I="
                alt="image 8" />
              <div class="case-study__body">
                <p class="case-study__category">Category 1, Category 2</p>
                <h3 class="case-study__title">
                  Redesigning a website to create a sense of corporate
                  sophistication and professionalism
                </h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mb-5">

      <div class="col">
        <div class="pos-relative">
          <span id="section-components-expertise" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Expertise
          </h2>

          <div class="card card-expertise">
            <a href="/_pages/expertise.html#expertise1">
              <div class="card-body card-expertise__body">
                <h3 class="card-title">UI Coding &amp; Architecture</h3>
                <p class="card-text">
                  Mock-up translation into web pages. High-level HTML5, CSS3,
                  and JavaScript coding. Accessibility coding for WCAG 2.0+
                  and AODA compliance.
                </p>
              </div>
              <div class="card-footer card-expertise__footer">
                <small class="text-body-secondary">Learn more</small>
              </div>
            </a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="pos-relative">
          <span id="section-components-article" class="page-anchor-dir"></span>
          <h2 class="text-center mb-3 section-max-w2 section-h-centering">
            Article
          </h2>

          <article class="card card-article bx-container">
            <a href="/_pages/single.html">
              <img
                src="https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg?size=626&amp;ext=jpg&amp;ga=GA1.1.1222169770.1701734400&amp;semt=ais"
                class="card-article-img img-fluid" alt="image 8">
              <div class="card-body">
                <p class="card-text">Month day, year</p>
                <h3 class="card-title m-0">
                  Lorem ipsum dolor, sit amet consectetur adipisicing elit delect est dolor, optio quaerat aut sequi ab.
                </h3>
              </div>
            </a>
          </article>
        </div>
      </div>

    </div>

  </section>



  <footer class="footer gap-top-margin gap-bottom-margin link-color-hover2 link-underlined">
    <div class="container footer-container d-flex flex-column">
      <header class="footer-header row">
        <div class="col-lg-6 offset-lg-3 text-center">
          <a href="<?php echo get_bloginfo('url'); ?>" class="navbar-brand">
		 
			  <img class="tenverto-logo" src="<?php echo esc_url( $logo[0] ); ?>" alt="Tenverto by Eric Njanga">
          </a>
          <p class="m-0">Design System, version 1.0. Return to <a href="<?php echo get_bloginfo('url'); ?>">main site</a>.</p>
        </div>
      </header>

    </div>
  </footer>






  <!-- Add the back-to-top button with arrow symbol -->
  <button class="btn-back-to-top" style="display: block;">
    <div class="arrow-container"><i class="bi bi-arrow-up"></i></div>
  </button>






  <!-- Modal -->
  <div class="modal fade" id="modal-testimonial-1" tabindex="-1" role="dialog"
    aria-labelledby="modal-testimonial-1Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <div>
            <h5 class="modal-title">First, last name</h5>
            <p class="modal-subtitle m-0">
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, quibu ntium incidu eos.
            </p>
          </div>
          <button type="button" class="btn-close btn-bs-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur minus quisquam non sed dicta, deserunt
            officiis. In asperiores dignissimos aperiam, sit aspernatur numquam quam illo alias sed deserunt distinctio
            dolorum?</p>
          <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolore laborum quasi ipsa sed modi non temporibus
            quos tempore earum laboriosam adipisci repudiandae eligendi aut saepe, incidunt quia doloribus qui
            doloremque?</p>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto enim eos quibusdam molestiae aperiam
            natus neque asperiores! Deleniti esse, explicabo ipsa dolores rem accusamus. Illo ex quas dolores error
            quibusdam!</p>
        </div>
      </div>
    </div>
  </div>


<?php 
	get_footer();
	?>