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
        $this->author = $author; // concrete
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

$doctor = new Author('Dr', 'John');
$ques = new Question('Are you fine?', $doctor);
echo $ques->getQuestion();
echo "<br>";
echo $ques->getAuthor();
echo "<br>";

$teacher = new Author('Sir', 'Smith');
$quesTwo = new Question('Are you understand?', $teacher);
echo $quesTwo->getQuestion();
echo "<br>";
echo $quesTwo->getAuthor();