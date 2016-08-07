<?php
class ShareModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM shares');
		$rows=$this->resultSet();
		return $rows;
	}
	public function add(){
		$post=filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
		// die("!!");
		if($post['submit']){
			$this->query("INSERT INTO shares (title, body, link, user_id) VALUES(:title, :body:,:link, :user_id)");
			// echo $post['link'];die();
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id',	2);
			$this->execute();
			// die("!!");
			if($this->lastInsertId()) 
			{ 
				header('Location: '.ROOT_URL.'shares');
			}
		}
		return;
	}
}