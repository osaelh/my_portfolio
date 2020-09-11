<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
  <a href="<?php echo URLROOT; ?>/projects" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <main>
  <div class="card card-body bg-light mt-5">
    <h2>Edit Project</h2>
    <p>Create a project with this form</p>
    <form action="<?php echo URLROOT; ?>/projects/edit/<?php echo $data['id']; ?>" method="post">
      <div class="form-group">
        <label for="title">title: <sup>*</sup></label>
        <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
        <span class="invalid-feedback"><?php echo $data['title_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="github_link">Github link: <sup>*</sup></label>
        <input type="text" name="github_link" class="form-control form-control-lg <?php echo (!empty($data['input_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['github_link']; ?>">
        <span class="invalid-feedback"><?php echo $data['input_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="image_link">Image link: <sup>*</sup></label>
        <textarea name="image_link" class="form-control form-control-lg <?php echo (!empty($data['input_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['image_link']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['input_err']; ?></span>
      </div>
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
  </div>
  <div>
</main>
  <?php require APPROOT . '/views/inc/footer.php'; ?>
  
