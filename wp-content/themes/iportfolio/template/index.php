<?php

/**
 * Template Name: home
 */
get_header();
$video_background = get_field('video_background');
$banner_image = get_field('banner_image');
$resume_file = get_field('resume_file');
$about_content = get_field('about_content');
$positon_content = get_field('positon_content');
$about_us_content = get_field('about_us_content');
$sklils_content = get_field('sklils_content');
$resume_text = get_field('resume_text');
$sumary_text = get_field('sumary_text');
$project_content = get_field('project_content');
?>
<style>
   #hero.hero.banner-image {
      position: relative;
      height: 100vh;
      overflow: hidden;
   }

   #hero .bg-video {
      position: absolute;
      top: 50%;
      left: 50%;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      transform: translate(-50%, -50%);
      object-fit: cover;
      z-index: 0;
   }

   #hero::after {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.35);
      z-index: 1;
   }

   #hero .content {
      position: relative;
      z-index: 2;
      color: #fff;
      text-align: center;
      top: 40%;
   }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
<main class="main">
    <section id="hero" class="hero section dark-background banner-image">
      <?php if(!empty($video_background)): ?>
         <video autoplay muted loop playsinline class="bg-video">
            <source src="<?= $video_background['url']; ?>" type="video/mp4">
         </video>
      <?php endif; ?>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
         <div class="hello-wrapper">
            <?php if (!empty($banner_image)): ?>
               <img src="<?= $banner_image['url']; ?>" class="hi_logo" alt="">
            <?php endif; ?>
            <p>I'm <span class="typed" data-typed-items="WordPress Developer"></span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
            <div class="download-btn">
               <a href="<?= $resume_file['url']; ?>" target="_blank" class="btn-slide2">
                  <span class="circle2"><i class="fa fa-download"></i></span>
                  <span class="title2 down-text">Download Cv</span>
                  <span class="title-hover2">Click Here</span>
               </a>
            </div>
         </div>
      </div>
   </section>
   <section id="about" class="about section">
      <div class="container section-title" data-aos="fade-up">
         <h2>About</h2>
         <?php if (!empty($about_content)): ?>
            <p><?php echo $about_content; ?></p>
         <?php endif; ?>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
         <div class="row gy-4 justify-content-center">
            <div class="col-lg-12 content">
               <?php if (!empty($positon_content)): ?><h2><?php echo $positon_content; ?></h2><?php endif; ?>
               <?php if (!empty($about_us_content)): ?><p class="fst-italic py-3"><?php echo $about_us_content; ?></p><?php endif; ?>
               <div class="row">
                  <div class="col-lg-6">
                     <ul>
                        <?php
                        if (have_rows('my_personal')) :
                           while (have_rows('my_personal')) : the_row();

                              $birthday = get_sub_field('birthday');
                              $phone    = get_sub_field('phone');
                              $city     = get_sub_field('city');
                              $state    = get_sub_field('state');

                              if (!empty($birthday)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $birthday; ?></li>
                              <?php endif;

                              if (!empty($phone)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $phone; ?></li>
                              <?php endif;

                              if (!empty($city)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $city; ?></li>
                              <?php endif;
                              if (!empty($state)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $state; ?></li>
                        <?php endif;
                           endwhile;
                        endif;
                        ?>
                     </ul>
                  </div>
                  <div class="col-lg-6">
                     <ul>
                        <?php
                        if (have_rows('my_bio')) :
                           while (have_rows('my_bio')) : the_row();
                              $age       = get_sub_field('age');
                              $degree    = get_sub_field('degree');
                              $email     = get_sub_field('email');
                              $freelance = get_sub_field('freelance');
                              if (!empty($age)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $age; ?></li>
                              <?php endif;
                              if (!empty($degree)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $degree; ?></li>
                              <?php endif;
                              if (!empty($email)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $email; ?></li>
                              <?php endif;
                              if (!empty($freelance)) : ?>
                                 <li><i class="bi bi-chevron-right"></i> <?php echo $freelance; ?></li>
                        <?php endif;
                           endwhile;
                        endif;
                        ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="skills" class="skills section light-background">
      <div class="container section-title" data-aos="fade-up">
         <h2>Skills</h2>
         <?php if (!empty($sklils_content)): ?><p><?php echo $sklils_content; ?></p><?php endif; ?>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
         <div class="row skills-content skills-animation">
            <div class="col-lg-6">
               <div class="progress">
                  <span class="skill"><span>Custom Theme & Plugin Development</span> <i class="val">80%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
               <div class="progress">
                  <span class="skill"><span>WooCommerce Customization</span> <i class="val">90%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
               <div class="progress">
                  <span class="skill"><span>Speed & Performance Optimization</span> <i class="val">90%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
               <div class="progress">
                  <span class="skill"><span>WordPress Security & Malware Protection</span> <i class="val">85%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="progress">
                  <span class="skill"><span>Responsive & Mobile-First Design</span> <i class="val">80%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
               <div class="progress">
                  <span class="skill"><span>API Integration (REST API & Third-Party)</span> <i class="val">70%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
               <div class="progress">
                  <span class="skill"><span>SEO-Friendly Development</span> <i class="val">85%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
               <div class="progress">
                  <span class="skill"><span>Problem-Solving & Client Communication</span> <i class="val">75%</i></span>
                  <div class="progress-bar-wrap">
                     <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="resume" class="resume section">
      <div class="container section-title" data-aos="fade-up">
         <h2>Resume</h2>
         <p><?php echo $resume_text; ?></p>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
               <h3 class="resume-title">Summary</h3>
               <div class="resume-item pb-0">
                  <p><em><?php echo $sumary_text; ?></em></p>
                  <ul>
                     <li>Ahmedabad, gujarat</li>
                     <li>9106685143</li>
                  </ul>
               </div>
               <h3 class="resume-title">Education</h3>
               <?php
               if (have_rows('education_details')) :
                  while (have_rows('education_details')) : the_row();
                     $clg_degree = get_sub_field('clg_degree');
                     $clg_year = get_sub_field('clg_year');
                     $clg_name = get_sub_field('clg_name');
                     $clg_content = get_sub_field('clg_content');
               ?>
                     <div class="resume-item">
                        <h4><?php echo $clg_degree; ?></h4>
                        <h5><?php echo $clg_year; ?></h5>
                        <p><em><?php echo $clg_name; ?></em></p>
                        <p><?php echo $clg_content; ?></p>
                     </div>
               <?php
                  endwhile;
               endif;
               ?>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
               <h3 class="resume-title">Professional Experience</h3>
               <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                     <?php if (have_rows('experience_details')) : ?>
                        <?php while (have_rows('experience_details')) : the_row();
                           $experience_h4 = get_sub_field('experience_h4');
                           $experience_h5 = get_sub_field('experience_h5');
                           $experience_city = get_sub_field('experience_city');
                        ?>
                           <div class="resume-item">
                              <h4><?php echo $experience_h4; ?></h4>
                              <h5><?php echo $experience_h5; ?></h5>
                              <p><em><?php echo $experience_city; ?></em></p>
                              <?php if (have_rows('experience_content')) : ?>
                                 <ul>
                                    <?php while (have_rows('experience_content')) : the_row();
                                       $experience_ptag = get_sub_field('experience_ptag');
                                    ?>
                                       <li>
                                          <p><?php echo $experience_ptag; ?></p>
                                       </li>
                                    <?php endwhile; ?>
                                 </ul>
                              <?php endif; ?>
                           </div>
                        <?php endwhile; ?>
                     <?php endif; ?>
               <?php endwhile;
               endif; ?>
            </div>
         </div>
      </div>
   </section>
   <section id="portfolio" class="services section">
      <div class="container section-title" data-aos="fade-up">
         <h2>Project Details</h2>
         <p><?php echo $project_content; ?></p>
      </div>
      <div class="container">
         <div class="row gy-4">
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
               <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
               <div>
                  <h4 class="title"><a href="https://azv.be/" target="_blank" class="stretched-link">AZV</a></h4>
                  <p>AZV i NGO website which provides healthcare services in Belgium and africa.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="200">
               <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
               <div>
                  <h4 class="title"><a href="https://securitiesdm.com/" target="_blank" class="stretched-link">SDM</a></h4>
                  <p class="description">SDM isa family-owned investment company specialised in private banking services. We have used Advanced Custom Fields and Cookle banner plugin for WordPress site for security we used ithemes security pro plugin. for multiple language we used WPML plugins.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
               <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
               <div>
                  <h4 class="title"><a href="https://slappiebrand.com/" target="_blank" class="stretched-link">Slappiedbrand</a></h4>
                  <p class="description">Slappiedbrand Website is product base website In USA. We use woocommenrnce. rafflepress pro and elementor plugins.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
               <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
               <div>
                  <h4 class="title"><a href="https://altwood.be/" target="_blank" class="stretched-link">Altwood</a></h4>
                  <p class="description">Altwood isa interior furniture website. we have used greenshift plugin.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="500">
               <div class="icon flex-shrink-0"><i class="bi bi-brightness-high"></i></div>
               <div>
                  <h4 class="title"><a href="https://radyx.com" target="_blank" class="stretched-link">Radyx</a></h4>
                  <p class="description">Radys provides advisory services like Finance. Operations: Human Resources. We used Advanced Custom Fields hubspot Integration plugins</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="600">
               <div class="icon flex-shrink-0"><i class="bi bi-calendar4-week"></i></div>
               <div>
                  <h4 class="title"><a href="https://valuexstream.eu/" target="_blank" class="stretched-link">Valuexstream</a></h4>
                  <p class="description">Valuexstream ts for strategic and operational optimization in the world of logistics and supply chains, We have used Advanced Custom Flelds, Mega menu and Cookle banner plugin for WordPress site for we used themes security pro plugin multiple language we used WML.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
               <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
               <div>
                  <h4 class="title"><a href="https://wheelhousehr.com/home/" target="_blank" class="stretched-link">Wheelhousehr</a></h4>
                  <p>Whether you are a small or a-mid-sized organization, scaling and growing brings with it more time-consuming and complex human resource needs, Thats why we created Wheelhouse, the simplified approach to your HR solutions.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="300">
               <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
               <div>
                  <h4 class="title"><a href="https://www.tec.be/" target="_blank" class="stretched-link">Tec.be</a></h4>
                  <p class="description">At Tec we have been working on various projects in sectors for more than 25 years as industry, IT, building & infrastructure, chemicals & petrochemicals. Bringing together wonderful people and protean adventures is what we do, 20 we provide magic.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="400">
               <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
               <div>
                  <h4 class="title"><a href="https://www.vinix.be/" target="_blank" class="stretched-link">Vinix.be</a></h4>
                  <p class="description">We are an independent creative apency fully dedicated to branding, digital marketing and web design. Collaborating with leading creatives in a variety of fields we boost companies, products and brands.</p>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 service-item d-flex" data-aos="fade-up" data-aos-delay="100">
               <div class="icon flex-shrink-0"><i class="bi bi-binoculars"></i></div>
               <div>
                  <h4 class="title"><a href="https://doramahjong.com/" target="_blank" class="stretched-link">Doramahjong.com</a></h4>
                  <p class="description">The free version of DORA Mahjong is finally here! Engage in heated PvP battles against players from all over the world with the free version of DORA Mahjong Only the free version of DORA Mahjong, with its long history and brand, can deliver a truly exciting mahjong game.Enjoy the free version of DORA Mahjong!</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <section id="contact" class="contact section">
      <div class="container section-title" data-aos="fade-up">
         <h2>Contact</h2>
         <p>Position at the Top Place your contact details at the very top of your resume, either centered or aligned to the left.</p>
      </div>
      <div class="container" data-aos="fade-up" data-aos-delay="100">
         <div class="row gy-4">
            <div class="col-lg-5">
               <div class="info-wrap">
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                     <i class="bi bi-geo-alt flex-shrink-0"></i>
                     <div>
                        <h3>Address</h3>
                        <p>380013, Satyawadi Society, Shanti Nagar, Usmanpura, Ahmedabad, Gujarat 380013</p>
                     </div>
                  </div>
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                     <i class="bi bi-telephone flex-shrink-0"></i>
                     <div>
                        <h3>Call Us</h3>
                        <a href="tel:+9106685143">
                           <p>+91 9106685143</p>
                        </a>
                     </div>
                  </div>
                  <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                     <i class="bi bi-envelope flex-shrink-0"></i>
                     <div>
                        <h3>Email Us</h3>
                        <a href="email:jenish.kotiya2000@gmail.com">jenish.kotiya2000@gmail.com</a>
                     </div>
                  </div>
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3671.259510396472!2d72.56764567400182!3d23.05094561527123!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e847d2cb8b615%3A0x5758ff2a651b2c5a!2sKetan%20Apartment!5e0!3m2!1sen!2sin!4v1721304921095!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
            </div>
            <div class="col-lg-7">
               <div class="row gy-4">
                  <?php echo do_shortcode('[contact-form-7 id="d9d115a" title="Contact form"]'); ?>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>
<?php get_footer(); ?>