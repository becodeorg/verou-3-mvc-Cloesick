<?php

declare(strict_types = 1);

class ArticleController
{
    //create private class of database
    private DatabaseManager $DataBase;
    //create db
    public function __construct()
    {   //require both files to setup db connection
        require "config.php";
        require "dbmanager.php";
        //$config + all elements from config.php
        $this->DataBase= new DatabaseManager($config["host"],$config["user"],$config["password"],$config["dbname"]);
        $this->DataBase->connect();
        //construct is setup -> db is now ready for use
        //phpmyAdmin OR TablePlus ->create database

    }
    public function index() //first step in function "index" is getArticles
    {
        // Load all required data from articles -> ONLY LOAD DATA
        $articles = $this->getArticles();
        // Load the view which accesses all articles ->SHOW VIEW WITH LOADED DATA
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        // TODO: prepare the database connection
        $query = "SELECT * FROM articles";  //create query
        $result = $this->DataBase->connection->prepare($query); //prepare query
        $result -> execute(); //execute query
        // DONE: you might want to use a re-usable databaseManager class ->ArticleController
        // TODO: fetch all articles as $rawArticles (as a simple array)
        $rawArticles = $result->fetchAll(PDO::FETCH_ASSOC);
        // pre($rawArticles);
        //per row from all row from "articles"-table --> one row is shown with all its data as rawarticle       
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class--see below
            //$articles[] = array push --> from empty array --> get each row --> push as new article-->next see Model
            //from "dumb" array towards "flexible class" through FOLDER "Model" -> blue print for class structure
            $articles[] = new Article($rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
            //added "id" after it was added to "Article.php"
        }
        return $articles;
        //return array
    }

    public function show()
    {
        // TODO: this can be used for a detail page
    }
}