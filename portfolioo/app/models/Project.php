<?php
  class Project {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getProjects(){
      $this->db->query('SELECT *,
                        projects.id as projectId,
                        users.id as userId,
                        projects.created_at as projectCreated,
                        users.created_at as userCreated
                        FROM projects
                        INNER JOIN users
                        ON projects.user_id = users.id
                        ORDER BY projects.created_at DESC
                        ');

      $results = $this->db->resultSet();

      return $results;
    }

    public function addProject($data){
      $this->db->query('INSERT INTO projects (title, user_id, image_link, github_link) VALUES(:title, :user_id, :github_link, :image_link)');
      // Bind values
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':user_id', $data['user_id']);
      $this->db->bind(':image_link', $data['image_link']);
      $this->db->bind(':github_link', $data['github_link']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateProject($data){
      $this->db->query('UPDATE projects SET title = :title, github_link = :github_link, image_link = :image_link WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':github_link', $data['github_link']);
      $this->db->bind(':image_link', $data['image_link']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getProjectById($id){
      $this->db->query('SELECT * FROM projects WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }

    public function deleteProject($id){
      $this->db->query('DELETE FROM projects WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
  }