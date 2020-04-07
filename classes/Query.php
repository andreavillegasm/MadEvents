<?php
class Query
{
    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }

    public function public_gallery()
    {
        $sql = "select * from gallery_listing";

        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $gallery_listing = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $gallery_listing;
    }
    public function admin_gallery()
    {
        $sql = "select * from users";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $gallery_users = $pdostm->fetchAll(PDO::FETCH_OBJ);
        return $gallery_users;
    }
    public function delete_pic($id)
    {
        $sql = "delete from gallery_listing where id=:id";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }
    public function add_pic($username, $posts, $tag_name, $image_path, $post_date)
    {
        $sql = "insert into gallery_listing (user_name, posts, tag_name, image_path, post_date ) values(:username, :posts,:tag_name, :image_path, :post_date)";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':username', $username);
        $pdostm->bindParam(':posts', $posts);
        $pdostm->bindParam(':tag_name', $tag_name);
        $pdostm->bindParam(':image_path', $image_path);
        $pdostm->bindParam(':post_date', $post_date);
        $count = $pdostm->execute();
        return $count;
    }
    public function edit_pic($id)
    {
        $sql = "select * from gallery_listing where id =:id";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':id', $id);
        $pdostm->execute();
        $values = $pdostm->fetch(PDO::FETCH_OBJ);
        return $values;
    }
    public function update_pic($postdescription, $tagdescription, $id)
    {
        $sql = "update gallery_listing set posts = :post, tag_name =:tag where id = :id ";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':post', $postdescription);
        $pdostm->bindParam(':tag', $tagdescription);
        $pdostm->bindParam(':id', $id);
        $count = $pdostm->execute();
        return $count;
    }

    //---------------For Login System---------------
    public function getUsers($username, $email)
    {
        $sql = "SELECT * FROM users WHERE username= :username or email= :email";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':username', $username);
        $pdostm->bindParam(':email', $email);
        $pdostm->execute();
        $values = $pdostm->fetch(PDO::FETCH_OBJ);
        return $values;
    }

    public function addUser($username, $email, $password)
    {
        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':username', $username);
        $pdostm->bindParam(':email', $email);
        $pdostm->bindParam(':password', $password);
        $count = $pdostm->execute();
        return $count;
    }
    //---------------For Comment System---------------
    public function setComments($userid, $username, $date, $message) {
        $sql = "INSERT INTO comments (userid, username, date_create, message) VALUES (:userid, :username, :date_create, :message);";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->bindParam(':userid', $userid);
        $pdostm->bindParam(':username', $username);
        $pdostm->bindParam(':date_create', $date);
        $pdostm->bindParam(':message', $message);
        $count = $pdostm->execute();
        return $count;
    }

    public function getComments() {
        $sql = "SELECT * FROM comments order by date_create DESC";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();
        $values = $pdostm->fetchAll();
        return $values;
    }
}
