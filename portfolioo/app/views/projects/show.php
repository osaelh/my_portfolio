<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="container">
<a href="<?php echo URLROOT; ?>/projects" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
<br>
<main>
<h1><?php echo $data['project']->title; ?></h1>
<br>
<div class="bg-secondary text-white p-2 mb-3">
  project by <?php echo $data['user']->name; ?> on <?php echo $data['project']->created_at; ?>
</div>
<p>Github link: <?php echo $data['project']->github_link; ?></p>
<p>Image link<?php echo $data['project']->image_link; ?></p>

<?php if($data['project']->user_id == $_SESSION['user_id']) : ?>
  <hr>
  <a href="<?php echo URLROOT; ?>/projects/edit/<?php echo $data['project']->id; ?>" class="btn btn-dark">Edit</a>

  <form class="" action="<?php echo URLROOT; ?>/projects/delete/<?php echo $data['project']->id; ?>" method="post">
    <input type="submit" value="Delete" class="btn btn-danger btn-block">
  </form>
<?php endif; ?>
</div>
</main>
<?php require APPROOT . '/views/inc/footer.php'; ?>
