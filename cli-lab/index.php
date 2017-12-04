<?php


function getFile($ext) {
    global $argv;
    
    foreach($argv as $value) {
        if(strtolower(pathinfo($value, PATHINFO_EXTENSION)) === $ext) {
            return $value;
        }
    }
    
    die("Missing " . $ext . " file.");
}

function getEmail() {
    global $argv;
    
    foreach($argv as $value) {
        if(filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return $value;
        }
    }
    
    die("Invalid email.");
}

function writeFileContents($stream, $textFile) {
 
    fprintf ($stream, "Contents of " . $textFile . ":\n");

    foreach(file($textFile) as $num => $line) {
        fprintf($stream, $line . "\n");
    }   
}

function listZipContents($stream, $zipFile) {
    fprintf($stream, "\nContnts of " . $zipFile . ":\n");
    
    $zip = zip_open($zipFile);
    
    while($zipFile = zip_read($zip)) {
        fprintf($stream, zip_entry_name($zipFile) . "\n");
    }
    
    
}

function getTextFileName() {
    $textFile = "";
    
    do {
        echo "Enter new text file name: ";
        $textFile = trim(fgets(STDIN));
    } while(strtolower(pathinfo($textFile, PATHINFO_EXTENSION)) != "txt");
    
    return $textFile;
}

$textFile = getFile("txt");
$zipFile = getFile("zip");
$jpgFile = getFile("jpg");
$email = getEmail();

writeFileContents(STDOUT, $textFile);
listZipContents(STDOUT, $zipFile);
exec ("open -a preview " . $jpgFile);


$newTextFileName = getTextFileName();

$file = fopen($newTextFileName, "w");
writeFileContents($file, $textFile);
listZipContents($file, $zipFile);
fclose($file);

$emailContents = file_get_contents($newTextFileName);
$emailContents = date("F j, Y, g:i a") . PHP_EOL . $emailContents;

echo "Emailing..." . PHP_EOL;
ini_set("sendmail_from", "sheldonlynn@outlook.com");
mail($email, "Lab App Message", $emailContents);