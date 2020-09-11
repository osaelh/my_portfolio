<?php require APPROOT . '/views/inc/header.php'; ?>
  <!-- <div class="jumbotron jumbotron-flud text-center">
    <div class="container">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    </div>
  </div> 
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
 
  </div> -->
  
  <main id="home">
    <h1 class="lg-heading">
      OUSSAMA
      <span class="text-secondary">ELHOUARI</span>
    </h1>
    <h2 class="sm-heading">
      Web Developer
    </h2>
    <div class="icons">
      <a href="#!">
        <i class="fab fa-linkedin fa-2x"></i>
      </a>
      <a href="#!">
        <i class="fab fa-github fa-2x"></i>
      </a>
    </div>
  </main>

  <main id="about">
    <h1 class="lg-heading">
      About
      <span class="text-secondary">Me</span>
    </h1>
    <h2 class="sm-heading">
      Let me tell you a few things...
    </h2>
    <div class="about-info">
      <img src="img/Oussama.jpg" alt="John Doe" class="bio-image">

      <div class="bio">
        <h3 class="text-secondary">BIO</h3>
        <p>My name is Oussama and I live Morocco.Today I primarily create websites, and I also work with web development both front-end and back-end, specifically with JavaScript and PHP. I have a wide range of skills that can easily be applied to all sorts of projects.</p>
      </div>

      <div class="job job-1">
        <h3>123 Webshop</h3>
        <h6>Full Stack Developer</h6>
        <p>I can help you develop a solid dynamic website with PHP and SQL (MVC strucure). </p>
      </div>

      <div class="job job-2">
        <h3>Web design</h3>
        <h6>Front End Developer</h6>
        <p>I can help you develop a fitting design for your new website or update and change the design on your existing WordPress website.</p>
      </div>

      <div class="job job-3">
        <h3>Webworks</h3>
        <h6>Graphic Designer</h6>
        <p>I can help you with all different types of graphic design, both for print or digital. Examples of graphic designs that I can help with are: Facebook ads, Instagram posts, Business cards, Flyers, Profile pictures, Banners.</p>
      </div>
    </div>
  </main>

  <main id="work">
    <h1 class="lg-heading">
      My
      <span class="text-secondary">Work</span>
    </h1>
    <h2 class="sm-heading">
      Check out some of my projects...
    </h2>
    <div class="projects">
    <?php foreach($data['projects'] as $project) : ?>
      <div class="item">
        
          <img src="<?php echo $project->image_link; ?>" alt="Project">
       
        <!-- <a href="#" class="btn-light">
          <i class="fas fa-eye"></i> Project
        </a> -->
        <a href="<?php echo $project->title; ?>" class="btn-dark">
          <i class="fab fa-github"></i> Github
        </a>
      </div>
      <?php endforeach; ?>
  </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>


