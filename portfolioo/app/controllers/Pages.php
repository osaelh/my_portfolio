<?php
  class Pages extends Controller {
    public function __construct(){
      $this->projectModel = $this->model('Project');
      $this->userModel = $this->model('User');
     
    }
    
    public function index(){
      // if(isLoggedIn()){
      //   redirect('shareposts');
      // }
      $projects = $this->projectModel->getProjects();

      $data = [
        'title' => 'Portfolio',
        'description' => '',
        'projects' => $projects
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About me',
        'description' => ''
      ];

      $this->view('pages/about', $data);
    }
  }