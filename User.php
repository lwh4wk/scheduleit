<?php


class User
{
    public $username;
    public $fname;
    public $lname;

    public function __construct($username, $fname, $lname) {
        $this->username = $username;
        $this->fname = $fname;
        $this->lname = $lname;
    }
}
