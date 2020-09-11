<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <?php flash('post_message'); ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Projects</h1>
    </div>
    <div class="col-md-6">
      <a href="<?php echo URLROOT; ?>/projects/add" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Add Project
      </a>
    </div>
  </div>
  
  <main id="work">

    <div class="projects">
    <?php foreach($data['projects'] as $project) : ?>
      <div class="item">
        <a href="#!">
          <img src="<?php echo $project->image_link; ?>" alt="Project">
        </a>
        <a href="#" class="btn-light">
          <i class="fas fa-eye"></i> Project
        </a>
        <a href="<?php echo $project->github_link; ?>" class="btn-dark">
          <i class="fab fa-github"></i> Github
        </a>
        <a href="<?php echo URLROOT; ?>/projects/show/<?php echo $project->projectId; ?>" class="btn btn-dark">More</a>
      </div>
      
      <?php endforeach; ?>
      </div>
  </main>
<?php require APPROOT . '/views/inc/footer.php'; ?>