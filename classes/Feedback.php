<?php

class Feedback
{

    private $dbcon;

    public function __construct($dbcon)
    {
        $this->dbcon = $dbcon;
    }

    // show all the feedback
    public function listFeedback()
    {
        // make it a bridge table for feedbacks table and users table
        $sql = "SELECT * FROM feedbacks join users on users.UserId = feedbacks.UserId";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_ASSOC);
    }
    // show all the feedback
    public function listFeedbackDetail($feedbackId)
    {
        $sql = "SELECT * FROM feedbacks join users on users.UserId = feedbacks.UserId WHERE feedbacks.FeedbackId = " . $feedbackId;
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_ASSOC);
    }

    // add feedback, param: userid, title, content
    public function addFeedback($userid, $title, $content)
    {
        // prepare sql
        $sql = "INSERT INTO feedbacks (UserId, Title, Content) 
              VALUES (:UserId, :Title, :Content) ";

        $pdostm = $this->dbcon->prepare($sql);

        $pdostm->bindParam(':UserId', $userid);
        $pdostm->bindParam(':Title', $title);
        $pdostm->bindParam(':Content', $content);

        // run sql and return the feedback of it
        return $pdostm->execute();
    }

    // delete feedback, param: feedback id
    public function deleteFeedback($id)
    {

        // delete by id
        $sql = "DELETE FROM feedbacks WHERE FeedbackId = $id";

        // prepare sql
        $pdostm = $this->dbcon->prepare($sql);

        // run sql and return the feedback of it
        return $pdostm->execute();
    }

    // update feedback, param: feedback id
    public function updateFeedback($id)
    {
        $sql = "SELECT * FROM feedbacks join users on users.UserId = feedbacks.UserId where FeedbackId = $id";
        $pdostm = $this->dbcon->prepare($sql);
        $pdostm->execute();

        return $pdostm->fetchAll(PDO::FETCH_ASSOC);
    }
}