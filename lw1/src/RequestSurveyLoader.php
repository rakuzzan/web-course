<?php

class RequestSurveyLoader
{
    public function loadSurvey(): Survey
    {
        $email = $_GET["email"] ?? "";
        $firstName = $_GET["first_name"] ?? "";
        $lastName = $_GET["last_name"] ?? "";
        $age = $_GET["age"] ?? "";
        return new Survey($email, $firstName, $lastName, $age);
    }
}