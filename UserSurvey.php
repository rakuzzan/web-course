<?php

header("Content-Type: text/plain");
class RequestSurveyLoader
{
    function data(): Survey
    {
        $email = $_GET["email"] ?? "";
        $firstName = $_GET["first_name"] ?? "";
        $lastName = $_GET["last_name"] ?? "";
        $age = $_GET["age"] ?? ""; 
        return new Survey($email, $firstName, $lastName, $age);  
    }   
}
class Survey
{
    private $email;
    private $firstName; 
    private $lastName;
    private $age; 

    public function __construct($email, $firstName, $lastName, $age)
    {
        $this->email = $email;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getAge(): string
    {
        return $this->age;
    }
}
class SurveyFileStorage
{
    public function saveFile(Survey $fileData)
    {
        if ($fileData->getEmail())
        {
            $fileName = 'data/' . $fileData->getEmail() . '.txt';
            if (file_exists($fileName))
            {
                $content = file($fileName);
                if ($fileData->getFirstName())
                {
                    $content[0] = 'First name: ' . $fileData->getFirstName() . "\n";
                }
                if ($fileData->getLastName())
                {
                    $content[1] = 'Last name: ' . $fileData->getLastName() . "\n";
                }
                if ($fileData->getAge())
                {    
                    $content[3] = 'Age: ' . $fileData->getAge();
                }
                $fileMode = fopen($fileName, 'w+');
                fwrite($fileMode, join($content));
                fclose($fileMode);
            }
            else
            {
                $fileMode = fopen($fileName, 'w');
                fwrite($fileMode, 'First name: ' . $fileData->getFirstName() . "\n");
                fwrite($fileMode, 'Last name: ' . $fileData->getLastName() . "\n");
                fwrite($fileMode, 'email: ' . $fileData->getEmail() . "\n");
                fwrite($fileMode, 'Age: ' . $fileData->getAge() . "\n");
                fclose($fileMode);
            }
        }
        else
        {
            echo('Не введен email');
        }
        return;
    } 
}
class SurveyPrinter
{
    public function printInfo(Survey $fileData)
    {
        if (file_exists('data/' . $fileData->getEmail() . '.txt'))
        {
            readfile('data/' . $fileData->getEmail() . '.txt');
        }
        return;
    }
}
$survey = new RequestSurveyLoader;
$fileData = $survey->data();
$fileStorage = new SurveyFileStorage;
$file = $fileStorage->saveFile($fileData);
$printFile = new SurveyPrinter;
$printFile->printInfo($fileData);