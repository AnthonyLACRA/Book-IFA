<?php


class Book
{
    private $book_id;
    private $title;
    private $author;
    private $description;
    private $cover;
    private $release_date;
    private $kind;
    private $format;
    private $cost;
    private $objBook = [];

    /**
     * Book constructor.
     * @param $book_id
     * @param $title
     * @param $description
     * @param $cover
     * @param $release_date
     * @param $kind
     * @param $format
     * @param $cost
     */
    public function __construct($book_id, $title, $author,  $description, $cover, $release_date, $kind, $format, $cost)
    {
        $this->book_id = $book_id;
        $this->title = $title;
        $this->author = $author;
        $this->description = $description;
        $this->cover = $cover;
        $this->release_date = $release_date;
        $this->kind = $kind;
        $this->format = $format;
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getBookId()
    {
        return $this->book_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }


    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getCover()
    {
        return $this->cover;
    }

    /**
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->release_date;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @return mixed
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    public static function getInfoBook() {
        $db = Database::getInstance();
        $stmt = $db->query("
SELECT *, books.id as book_id, name as author_name 
FROM books 
INNER JOIN book_author 
ON book_author.book_id = books.id
INNER JOIN authors
ON book_author.author_id = authors.id");
        $res = $stmt->fetchAll();

        foreach ($res as $book) {
            $objBook[] = new Book(
                $book["book_id"],
                $book["title"],
                $book["author_name"],
                $book["description"],
                $book["cover"],
                $book["release_date"],
                $book["kind"],
                $book["format"],
                $book["cost"]
            );

        }
        return $objBook;
    }

    public static function getInfoBookByID($id) {
        $db = Database::getInstance();
        $stmt = $db->query("
SELECT *, books.id as book_id, name as author_name 
FROM books 
INNER JOIN book_author 
ON book_author.book_id = books.id
INNER JOIN authors
ON book_author.author_id = authors.id
WHERE books.id = $id");
        $book = $stmt->fetch();

        $res = new Book(
                $book["book_id"],
                $book["title"],
                $book["author_name"],
                $book["description"],
                $book["cover"],
                $book["release_date"],
                $book["kind"],
                $book["format"],
                $book["cost"]
            );


        return $res;
    }




}