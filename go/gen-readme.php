<?php

$readme="";

function getDirectories($directoryPath, $pattern) {
    $directoryIterator = new RecursiveDirectoryIterator($directoryPath, RecursiveDirectoryIterator::SKIP_DOTS);
    $recursiveIterator = new RecursiveIteratorIterator($directoryIterator, RecursiveIteratorIterator::CHILD_FIRST);

    $directories = [];

    foreach($recursiveIterator as $path) {
        if ($path->isDir() && preg_match($pattern, $path->getFilename())) {
            $directories[] = $path->getPathname();
        }
    }

    // Sort the array
    sort($directories);

    return $directories;
}

// Function that create a global readme.md file
function createReadme() {
    $readme = "# Learn Go\n\n";

    $taskDirectories = getDirectories('.', '/task-/');
    // echo '<pre>'; print_r($taskDirectories); echo '</pre>';

    // Print total number of tasks completed in the ReadMe.md file

    $readme .= ">Total number of tasks: " . count($taskDirectories) . "\n\n";

    $readme .= "## TaskSet\n\n";


    foreach ($taskDirectories as $taskDirectory) {
        $taskName = basename($taskDirectory);
        $readme .= "- [$taskName]($taskDirectory)\n";
    }



    file_put_contents('Readme.md', $readme);
}

createReadme();

?>