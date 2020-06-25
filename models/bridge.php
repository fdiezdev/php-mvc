<?php 

class Connection
{
    public function connect()
    {
        $link = new PDO("mysql:host=localhost;dbname=lms","root","");
        $link->exec("set names utf-8");

        return $link;

        $link = null;
    }
}