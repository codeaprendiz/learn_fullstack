<?php

// find . -name "batch-*" | tr "/" " " | awk '{print "\"### " $3 "\"" " => " "\"### " $3 " -- [Title](URL)\","}' | sort -n
$batch_links = array(
    "### batch-1--001-018" => "### batch-1--001-018 -- [LinkedIn - Learning Nodejs](https://www.linkedin.com/learning/learning-node-js-2017)",
    "### batch-2--019-044" => "### batch-2--019-044 -- [LinkedIn - Node.js Essential Training](https://www.linkedin.com/learning/node-js-essential-training-14888164/learning-the-node-js-basics)",
    "### batch-3--045-049" => "### batch-3--045-049 -- [LinkedIn - Learning npm, a package manager](https://www.linkedin.com/learning/learning-npm-a-package-manager)",
    "### batch-4--050-076" => "### batch-4--050-076 -- [LinkedIn - Express Essential Training](https://www.linkedin.com/learning/express-essential-training-14539342)",
    "### batch-5--077-093" => "### batch-5--077-093 -- [Not Revised Yet](URL)",
    "### batch-6--094-104" => "### batch-6--094-104 -- [Not Revised Yet](URL)",
    "### batch-7--105-110" => "### batch-7--105-110 -- [Not Revised Yet](URL)",
);

// find . -name "batch-*" | tr "/" " " | awk '{print "\"### " $3 "\"" ","}' | sort -n
$batch_folders = array(
    "### batch-1--001-018",
    "### batch-2--019-044",
    "### batch-3--045-049",
    "### batch-4--050-076",
    "### batch-5--077-093",
    "### batch-6--094-104",
);


// Tested and works
function createTree($dir) {
    $tree = [];

    $dirs = array_filter(glob($dir . '/*'), 'is_dir');
    sort($dirs);

    foreach ($dirs as $d) {
        $dirName = trim(basename($d));

        // Include directories that match the pattern task-*
        if (preg_match('/^task-/', $dirName)) {
            $relativePath = substr($d, strlen(getcwd()) + 1);
            $link = trim(str_replace(' ', '-', strtolower($relativePath)));

            $pathParts = explode('/', $relativePath);
            $parentDir = $pathParts[count($pathParts) - 2]; // Get the immediate parent directory name

            if (!isset($tree[$parentDir])) {
                $tree[$parentDir] = [];
            }

            $tree[$parentDir][] = "- [$dirName]($link)";
        }

        // Traverse into subdirectories even if they don't match the pattern
        if (!empty(glob("$d/*"))) {
            $tree = array_merge($tree, createTree($d));
        }
    }

    return $tree;
}

// Tested and works
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

// I forgot if this was tested, I think it was. But I'm not sure. So, let's test it again when we need it.
function incrementTasks($start_task_number, $increment_by, $stop_task_number, $taskDirectories) {
    // if $start_task_number > $stop_task_number, exit saying start task number must be less than stop task number
    if($start_task_number > $stop_task_number) {
        echo "Start task number must be less than stop task number\n";
        exit;
    }

    foreach($taskDirectories as $directoryPath) {
        $directoryName = basename($directoryPath);
        if (preg_match('/task-(\d+)(.*)/', $directoryName, $matches)) {
            $taskNumber = (int)$matches[1];
            $suffix = $matches[2];
            if($taskNumber >= $start_task_number && $taskNumber <= $stop_task_number) {
                $newTaskNumber = str_pad($taskNumber + $increment_by, 3, '0', STR_PAD_LEFT);
                $newDirectoryName = 'task-' . $newTaskNumber . $suffix;
                $newDirectoryPath = str_replace($directoryName, $newDirectoryName, $directoryPath);
                if(rename($directoryPath, $newDirectoryPath)) {
                    echo "Successfully renamed {$directoryPath} to {$newDirectoryPath}\n";
                } else {
                    echo "Failed to rename {$directoryPath} to {$newDirectoryPath}\n";
                }
            }
        }
    }
}

// To be tested
function incrementTasks_v1($start_task_number, $increment_by, $stop_task_number, $taskDirectories) {
    // Determine direction
    $direction = $start_task_number <= $stop_task_number ? 1 : -1;

    // Adjust loop conditions based on direction
    $condition = $direction > 0
        ? function($taskNumber) use ($start_task_number, $stop_task_number) { return $taskNumber >= $start_task_number && $taskNumber <= $stop_task_number; }
        : function($taskNumber) use ($start_task_number, $stop_task_number) { return $taskNumber <= $start_task_number && $taskNumber >= $stop_task_number; };

    foreach($taskDirectories as $directoryPath) {
        $directoryName = basename($directoryPath);
        if (preg_match('/task-(\d+)(.*)/', $directoryName, $matches)) {
            $taskNumber = (int)$matches[1];
            $suffix = $matches[2];
            if($condition($taskNumber)) {
                $newTaskNumber = str_pad($taskNumber + $direction * $increment_by, 3, '0', STR_PAD_LEFT);
                $newDirectoryName = 'task-' . $newTaskNumber . $suffix;
                $newDirectoryPath = str_replace($directoryName, $newDirectoryName, $directoryPath);
                if(rename($directoryPath, $newDirectoryPath)) {
                    echo "Successfully renamed {$directoryPath} to {$newDirectoryPath}\n";
                } else {
                    echo "Failed to rename {$directoryPath} to {$newDirectoryPath}\n";
                }
            }
        }
    }
}

// Can be decommissioned after as we now have decrementTasks_v1. Let's do it after 2 months.
function decrementTasks($start_task_number, $decrement_by, $stop_task_number, $taskDirectories) {
    // Ensure that $start_task_number > $stop_task_number
    if ($start_task_number <= $stop_task_number) {
        echo "The start task number should be greater than the stop task number. Exiting...\n";
        return;
    }

    foreach($taskDirectories as $directoryPath) {
        $directoryName = basename($directoryPath);
        if (preg_match('/task-(\d+)(.*)/', $directoryName, $matches)) {
            $taskNumber = (int)$matches[1];
            $suffix = $matches[2];
            if($taskNumber >= $stop_task_number && $taskNumber <= $start_task_number) {
                $newTaskNumber = str_pad($taskNumber - $decrement_by, 3, '0', STR_PAD_LEFT);
                $newDirectoryName = 'task-' . $newTaskNumber . $suffix;
                $newDirectoryPath = str_replace($directoryName, $newDirectoryName, $directoryPath);
                if(rename($directoryPath, $newDirectoryPath)) {
                    echo "Successfully renamed {$directoryPath} to {$newDirectoryPath}\n";
                } else {
                    echo "Failed to rename {$directoryPath} to {$newDirectoryPath}\n";
                }
            }
        }
    }
}

// Tested and works
function decrementTasks_v1($start_task_number, $decrement_by, $stop_task_number, $taskDirectories) {
    // Determine direction
    $direction = $start_task_number < $stop_task_number ? 1 : -1;

    // Adjust loop conditions based on direction
    $condition = $direction > 0
        ? function($taskNumber) use ($start_task_number, $stop_task_number) { return $taskNumber >= $start_task_number && $taskNumber <= $stop_task_number; }
        : function($taskNumber) use ($start_task_number, $stop_task_number) { return $taskNumber <= $start_task_number && $taskNumber >= $stop_task_number; };

    foreach($taskDirectories as $directoryPath) {
        $directoryName = basename($directoryPath);
        if (preg_match('/task-(\d+)(.*)/', $directoryName, $matches)) {
            $taskNumber = (int)$matches[1];
            $suffix = $matches[2];
            if($condition($taskNumber)) {
                $newTaskNumber = str_pad($taskNumber - $direction * $decrement_by, 3, '0', STR_PAD_LEFT);
                $newDirectoryName = 'task-' . $newTaskNumber . $suffix;
                $newDirectoryPath = str_replace($directoryName, $newDirectoryName, $directoryPath);
                if(rename($directoryPath, $newDirectoryPath)) {
                    echo "Successfully renamed {$directoryPath} to {$newDirectoryPath}\n";
                } else {
                    echo "Failed to rename {$directoryPath} to {$newDirectoryPath}\n";
                }
            }
        }
    }
}


function renameBatchFolders($batchDirectories) {
    foreach($batchDirectories as $batchDirectory) {
        // Initialize min and max task numbers
        $minTaskNumber = PHP_INT_MAX;
        $maxTaskNumber = PHP_INT_MIN;

        // Get all task directories in the batch
        $taskDirectories = getDirectories($batchDirectory, '/task-/');

        foreach($taskDirectories as $taskDirectory) {
            if (preg_match('/task-(\d+)/', basename($taskDirectory), $matches)) {
                $taskNumber = (int)$matches[1];
                $minTaskNumber = min($minTaskNumber, $taskNumber);
                $maxTaskNumber = max($maxTaskNumber, $taskNumber);
            }
        }

        if($minTaskNumber !== PHP_INT_MAX && $maxTaskNumber !== PHP_INT_MIN) {
            $newBatchName = preg_replace('/--\d+-\d+/', '--' . str_pad($minTaskNumber, 3, '0', STR_PAD_LEFT) . '-' . str_pad($maxTaskNumber, 3, '0', STR_PAD_LEFT), basename($batchDirectory));
            $newBatchPath = str_replace(basename($batchDirectory), $newBatchName, $batchDirectory);

            if(rename($batchDirectory, $newBatchPath)) {
                echo "Successfully renamed {$batchDirectory} to {$newBatchPath}\n";
            } else {
                echo "Failed to rename {$batchDirectory} to {$newBatchPath}\n";
            }
        }
    }
}



// Usage
$directoryPath = '.';
// $taskDirectories = getTaskDirectories($directoryPath);
$taskDirectories = getDirectories('.', '/task-/');
$batchDirectories = getDirectories('.', '/batch-/');




// echo '<pre>'; print_r($batchDirectories); echo '</pre>';
// echo '<pre>'; print_r($taskDirectories); echo '</pre>';


/* ***************************************************************************
The following part can be uncommented when you want the script to make changes.
* ****************************************************************************/

// $start_task_number = 77;
// $increment_by = 25;
// $stop_task_number = 110;
// incrementTasks($start_task_number, $increment_by, $stop_task_number, $taskDirectories);


// $start_task_number = 79;
// $decrement_by = 2;
// $stop_task_number = 112;
// decrementTasks_v1($start_task_number, $decrement_by, $stop_task_number, $taskDirectories);


// renameBatchFolders($batchDirectories);

/* ****************************************************************************************
End of uncommentable part.
* ****************************************************************************************/


// The following is used to generate the ReadMe.md file

$content = "## Tasks\n\n";

$tree = createTree(getcwd() . "/taskset");  // use absolute path to start

foreach ($tree as $parentDir => $links) {
    $content .= "### $parentDir\n\n";
    $content .= implode("\n", $links);
    $content .= "\n\n";
}

// Get static content from ReadMe-static.md
$staticContent = file_get_contents("ReadMe-static.md");

// Get batch links
$batchLinks = implode("\n", $batch_links);

// Append $content to $staticContent
$content = $staticContent . "\n\n" . $content;

// Iterate through batch_folders and for every item in batch_folders, replace the corresponding item in $content with the corresponding item in $batchLinks
foreach($batch_folders as $batch_folder) {
    if (array_key_exists($batch_folder, $batch_links)) {
        $content = str_replace($batch_folder, $batch_links[$batch_folder], $content);
    } else {
        echo "Key '{$batch_folder}' does not exist in batch_links array.\n";
    }
}


file_put_contents("ReadMe.md", $content);

?>
