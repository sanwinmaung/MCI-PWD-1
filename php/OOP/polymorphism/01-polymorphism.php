<?php

abstract class Human
{
    abstract public function work();
}

class Teacher extends Human
{
    public function work()
    {
        echo "Teach Lesson!";
    }
}

class Doctor extends Human
{
    public function work()
    {
        echo "Treat patient!";
    }
}

class CivilEngineer extends Human
{
    public function work()
    {
        echo "Build Buildings!";
    }
}

$human = new Teacher();
$human->work();
echo "<br>";

$human = new Doctor();
$human->work();
echo "<br>";

$human = new CivilEngineer();
$human->work();
echo "<br>";


abstract class Database
{
    abstract public function connect();
}

class MySql extends Database
{
    public function connect()
    {
        echo "execute mysql connection code!";
    }
}

class OracleDB extends Database
{
    public function connect()
    {
        echo "execute oracle db connection code!";
    }
}

class SQLite extends Database
{
    public function connect()
    {
        echo "execute sqlite connection code!";
    }
}

$database_connection = new SQLite();
$database_connection->connect();