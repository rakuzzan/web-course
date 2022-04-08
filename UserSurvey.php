<?php

header("Content-Type: text/plain");

require_once 'src/RequestSurveyLoader.php';
require_once 'src/Survey.php';
require_once 'src/SurveyFileStorage.php';
require_once 'src/SurveyPrinter.php';

$survey = new RequestSurveyLoader;
$fileData = $survey->data();
$fileStorage = new SurveyFileStorage;
$file = $fileStorage->saveFile($fileData);
$printFile = new SurveyPrinter;
$printFile->printInfo($fileData);