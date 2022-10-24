<?php

class Author
{
    private $firstName;
    private $lastName;

    public function __construct($firstName, $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }
}

class Question
{
    private $author;
    private $question;

    public function __construct($question, Author $author)
    {
        $this->question = $question;
        // $this->author = new Author('John', 'Doe'); // tightly dependency // concrete class
        // $this->author = new Author($firstName, $lastName); // concrete
        $this->author = $author;
    }

    public function getQuestion()
    {
        return $this->question;
    }


    public function getAuthor()
    {
        return $this->author->getFirstName() . ' ' . $this->author->getLastName();
    }
}

$authorOne = new Author("John", "Doe");
$ques = new Question('How old are you?', $authorOne);
echo $ques->getQuestion();
echo "<br>";
echo $ques->getAuthor();
echo "<br>";

$authorTwo = new Author("Peter", "Parker");
$quesTwo = new Question('Are you ok?', $authorTwo);
echo $quesTwo->getQuestion();
echo "<br>";
echo $quesTwo->getAuthor();