<?php

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