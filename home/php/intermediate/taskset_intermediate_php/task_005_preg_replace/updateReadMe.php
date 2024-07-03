<?php

// Set the error reporting level to include all types of errors and warnings
error_reporting(E_ALL);

// Display errors on the screen (useful for debugging)
ini_set('display_errors', 1);

// Custom error handler function
function handleError($errno, $errstr, $errfile, $errline) {
    // Error message
    $message = "Error [$errno]: $errstr in $errfile on line $errline\n";

    // Display the error message
    echo $message;

    // Exit the script
    exit(1);
}

// Set the custom error handler
set_error_handler('handleError');

// Default value for the first argument
$defaultArg = 'ReadMe.md';

// Check if the first argument is provided
$firstArg = isset($argv[1]) ? $argv[1] : $defaultArg;

echo "Argument: $firstArg\n";

// Command to find all ReadMe.md files from the current directory
$command_to_find_all_readMe_files_from_current_directory = "find . -name $firstArg";
$all_readMe_files_from_current_directory = shell_exec($command_to_find_all_readMe_files_from_current_directory);

print_r($all_readMe_files_from_current_directory);

// For each ReadMe file, replace
// <br>\n## with ##
// <br>\n### with ###
// <br>\n#### with ####
// <br>\n##### with #####
// and save the file
$readMe_files = explode("\n", $all_readMe_files_from_current_directory);

foreach ($readMe_files as $readMe_file) {
    $readMe_file = trim($readMe_file);
    if (empty($readMe_file)) {
        continue;
    }

    $readMe_file_contents = file_get_contents($readMe_file);

    // Replace <br>\n before the headings with just the headings
    $readMe_file_contents = preg_replace('/<br>\s*##/', '##', $readMe_file_contents);
    $readMe_file_contents = preg_replace('/<br>\s*###/', '###', $readMe_file_contents);
    $readMe_file_contents = preg_replace('/<br>\s*####/', '####', $readMe_file_contents);
    $readMe_file_contents = preg_replace('/<br>\s*#####/', '#####', $readMe_file_contents);

    file_put_contents($readMe_file, $readMe_file_contents);
}

?>
