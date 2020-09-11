<?php
  class Projects extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->projectModel = $this->model('Project');
      $this->userModel = $this->model('User');
    }

    public function index(){
      // Get posts
      $projects = $this->projectModel->getProjects();

      $data = [
        'projects' => $projects
      ];

      $this->view('projects/index', $data);
    }

    public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'title' => trim($_POST['title']),
          'image_link' => trim($_POST['image_link']),
          'github_link' => trim($_POST['github_link']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'input_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['image_link'])){
          $data['input_err'] = 'Please enter the link';
        }
        if(empty($data['github_link'])){
          $data['input_err'] = 'Please enter the link';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['input_err'])){
          // Validated
          if($this->projectModel->addProject($data)){
            flash('post_message', 'Project Added');
            redirect('projects');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('projects/add', $data);
        }

      } else {
        $data = [
          'title' => '',
          'github_link' => '',
          'image_link' => ''
        ];
  
        $this->view('projects/add', $data);
      }
    }

    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
          'id' => $id,
          'title' => trim($_POST['title']),
          'github_link' => trim($_POST['github_link']),
          'image_link' => trim($_POST['image_link']),
          'user_id' => $_SESSION['user_id'],
          'title_err' => '',
          'input_err' => ''
        ];

        // Validate data
        if(empty($data['title'])){
          $data['title_err'] = 'Please enter title';
        }
        if(empty($data['github_link'])){
          $data['input_err'] = 'Please enter the link';
        }
        if(empty($data['image_link'])){
          $data['input_err'] = 'Please enter the link';
        }

        // Make sure no errors
        if(empty($data['title_err']) && empty($data['input_err'])){
          // Validated
          if($this->projectModel->updateProject($data)){
            flash('post_message', 'Project Updated');
            redirect('projects');
          } else {
            die('Something went wrong');
          }
        } else {
          // Load view with errors
          $this->view('projects/edit', $data);
        }

      } else {
        // Get existing post from model
        $project = $this->projectModel->getProjectById($id);

        // Check for owner
        if($project->user_id != $_SESSION['user_id']){
          redirect('projects');
        }

        $data = [
          'id' => $id,
          'title' => $project->title,
          'github_link' => $project->github_link,
          'image_link' => $project->image_link
        ];
  
        $this->view('projects/edit', $data);
      }
    }

    public function show($id){
      $project = $this->projectModel->getProjectById($id);
      $user = $this->userModel->getUserById($project->user_id);

      $data = [
        'project' => $project,
        'user' => $user
      ];

      $this->view('projects/show', $data);
    }

    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Get existing post from model
        $project = $this->projectModel->getProjectById($id);
        
        // Check for owner
        if($post->user_id != $_SESSION['user_id']){
          redirect('projects');
        }

        if($this->projectModel->deleteProject($id)){
          flash('post_message', 'Project Removed');
          redirect('projects');
        } else {
          die('Something went wrong');
        }
      } else {
        redirect('projects');
      }
    }
  }