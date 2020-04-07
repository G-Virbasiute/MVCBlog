<?php

class Dashboard {

    public $dashboardid;
    public $dashboard;

   function __construct($postid, $userid, $title, $category, $blurb, $mainimage, $content, $rating, $created, $postviews, $poststatus) {
        $this->postid = $postid;
        $this->userid = $userid;
        $this->title = $title;
        $this->category = $category;
        $this->blurb = $blurb;
        $this->mainimage = $mainimage;
        $this->content = $content;
        $this->rating = $rating;
        $this->created = $created;
        $this->postviews = $postviews;
        $this->poststatus = $poststatus;
    }
}

?>