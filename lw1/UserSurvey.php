<?php

header("Content-Type: text/plain");

require_once 'src/ClassesRequest.php';

$survey = new RequestSurveyLoader;
$fileData = $survey->loadSurvey();
$fileStorage = new SurveyFileStorage;
$file = $fileStorage->saveFile($fileData);
$printFile = new SurveyPrinter;
$printFile->printInfo($fileData);