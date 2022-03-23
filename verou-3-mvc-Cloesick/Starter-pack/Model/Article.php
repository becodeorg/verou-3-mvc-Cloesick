<?php

declare(strict_types=1);

class Article
{
    //added int $id -> use class Article -> get id per each row
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public function __construct(int $id, string $title, ?string $description, ?string $publishDate)
    {//added int$id
        $this->id= $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    public function formatPublishDate($format = 'DD-MM-YYYY')

    {
        $newDate= date("d-m-Y", strtotime($this->publishDate));
        return $newDate;
        // TODO: return the date in the required format
    }
}