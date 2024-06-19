<?php

function createAssociativeArrayOfReqDirs_v1($currentFoldersRelativePathInConsideration = './', $directoryRegex = '/^task_/')
{
    $associativeArrayOfTasksetDirectories = [];

    $arrayOfRelativePathsOfChildFoldersInCurrentFolder = array_filter(
                                    glob($currentFoldersRelativePathInConsideration . '/*'), // The glob function in PHP searches for all files and directories that match the given pattern.
                                    'is_dir'
                                    ); //         arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array ([0] => ./home/css/css_essential_training/taskset_css_css/task_000_zero, [1] => ./home/css/css_essential_training/taskset_css_css/task_001_one )
    sort($arrayOfRelativePathsOfChildFoldersInCurrentFolder);

    foreach ($arrayOfRelativePathsOfChildFoldersInCurrentFolder as $childFoldersRelativePathInCurrentFolder) { // childFoldersRelativePathInCurrentFolder: ./home/css/css_essential_training/taskset_css_css/task_000_zero
        $baseDirectoryName = trim(basename($childFoldersRelativePathInCurrentFolder)); // baseDirectoryName: task_000_zero

        if (preg_match($directoryRegex, $baseDirectoryName)) {
            $childFoldersAbsolutePathInCurrentFolder = realpath($childFoldersRelativePathInCurrentFolder); // childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/home/css/css_essential_training/taskset_css_css/task_000_zero
            $childFoldersRelativePathFromHome = substr($childFoldersAbsolutePathInCurrentFolder, strpos($childFoldersAbsolutePathInCurrentFolder, 'home')); // childFoldersRelativePathFromHome: home/css/css_essential_training/taskset_css_css/task_000_zero

            $arrayOfPathPartsFromHomeAfterRemovingSlash = explode(DIRECTORY_SEPARATOR, $childFoldersRelativePathFromHome); //                 arrayOfPathPartsFromHomeAfterRemovingSlash: Array([0] => home, [1] => css, [2] => css, [3] => taskset_css_css, [4] => task_000_zero)
            $parentDirOfCurrentTaskDirectory = $arrayOfPathPartsFromHomeAfterRemovingSlash[count($arrayOfPathPartsFromHomeAfterRemovingSlash) - 2]; // parentDirOfCurrentTaskDirectory: taskset_css_css

            if (!isset($associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory])) { // if not initialized, initialize it as an empty array
                $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory] = []; // associativeArrayOfTasksetDirectories[taskset_css_css]: task_000_zero home/css/css_essential_training/taskset_css_css/task_000_zero
            }
            $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory][] = "$baseDirectoryName $childFoldersRelativePathFromHome"; // $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory][]: The [] notation is used to append an element to the array associated with the key $parentDirOfCurrentTaskDirectory. 
        }

        if (!empty(glob("$childFoldersRelativePathInCurrentFolder/*"))) { // The glob function in PHP searches for all files and directories that match the given pattern. The !empty(...) condition checks if the array returned by glob is not empty, meaning that there are files or subdirectories present in the directory.
            $associativeArrayOfTasksetDirectories = array_merge($associativeArrayOfTasksetDirectories, createAssociativeArrayOfReqDirs_v1($childFoldersRelativePathInCurrentFolder));
        }
    }
    return $associativeArrayOfTasksetDirectories;
}




function createIndividualSectionsMarkdown($associativeArrayOfReqDirs)
{
    foreach ($associativeArrayOfReqDirs as $tasksetDirectoryKey => $arrayOfDirectoriesInTasksetDirectory) {
        $markdown = '';
        $numberOfTasksInTasksetDirectory = count($arrayOfDirectoriesInTasksetDirectory);
        preg_match('/home\/.*?(?=\/task_)/', $arrayOfDirectoriesInTasksetDirectory[0], $matches);
        $relativePathToTasksetDirectoryReadMeFile = $matches[0];
        $relativePathToTasksetDirectoryReadMeFile = substr($relativePathToTasksetDirectoryReadMeFile, 0, strrpos($relativePathToTasksetDirectoryReadMeFile, '/'));
        print("----------".$relativePathToTasksetDirectoryReadMeFile);
        # $commandToGetStaticContentOfTasksetDirectory = 'cat ' . $relativePathToTasksetDirectoryReadMeFile .'/ReadMe_static.md | egrep -v ReadMe_static 2>/dev/null';
        # $staticContentOfTasksetDirectory = shell_exec($commandToGetStaticContentOfTasksetDirectory);
        $markdown .= "# $tasksetDirectoryKey\n\n> Auto generated ReadMe. Number of tasks: $numberOfTasksInTasksetDirectory\n";
        # $markdown .= $staticContentOfTasksetDirectory;
        $markdown .= "\n| Task | Description |\n";
        $markdown .= "| --- | --- |\n";
        foreach ($arrayOfDirectoriesInTasksetDirectory as $taskDirectoryChildFolderConcatenatedWithRelativePath) {
            $taskNumber = substr($taskDirectoryChildFolderConcatenatedWithRelativePath, strpos($taskDirectoryChildFolderConcatenatedWithRelativePath, 'task_'), 8);
            $arrayOfChildFolderNameAndItsRelativePath=explode(' ', $taskDirectoryChildFolderConcatenatedWithRelativePath);
            $childFolderName=$arrayOfChildFolderNameAndItsRelativePath[0];
            $childFolderName=$arrayOfChildFolderNameAndItsRelativePath[0];
            $arrayOfChildFoldersRelativePathExplodedWithSlash = explode('/', $arrayOfChildFolderNameAndItsRelativePath[1]);
            $tasksetDirectoryName = $arrayOfChildFoldersRelativePathExplodedWithSlash[count($arrayOfChildFoldersRelativePathExplodedWithSlash) - 2]; // second last element
            $markdown .= "| $taskNumber | [$childFolderName]($tasksetDirectoryName/$childFolderName) |\n";
        }
        print("----------".$relativePathToTasksetDirectoryReadMeFile);
        file_put_contents($relativePathToTasksetDirectoryReadMeFile . '/ReadMe.md', $markdown);
    }
}

function createGlobalMarkdownTable($associativeArrayOfReqDirs) {

    // Execute the find command and count the number of lines
    $commandToGetTotalNumberOfTasks = 'find . -name "task_*" | wc -l';
    $totalNumberOfTasks = shell_exec($commandToGetTotalNumberOfTasks);
    // remove whitespace from the beginning and end of the string
    $totalNumberOfTasks = trim($totalNumberOfTasks);
    ## First heading of ReadMe.md
    $markdown = "# Home\n\n> Auto generated ReadMe. Number of tasks: $totalNumberOfTasks\n\n";
    
    // ls -ltrh home | egrep -v "total" | awk '{print "\"" $9 "\","}' |  tr -d "\"," |  sort
    $commandToGetAllFoldersInCurrentDir='ls -ltrh home | egrep -v "total" | awk \'{print "\"" $9 "\","}\' |  tr -d "\"," | sort';
    $arrayOfFolderNames = shell_exec($commandToGetAllFoldersInCurrentDir); // Array ( [0] => css, [1] => javascript )
    
    // Convert the string to an array, splitting by new lines and trimming each line
    $arrayOfFolderNames = array_filter(array_map('trim', explode("\n", $arrayOfFolderNames)));
    print_r($arrayOfFolderNames);
    
    ## Create the table of contents section
    foreach ($arrayOfFolderNames as $folderName) { // folderName=css $folderName is the value of the current element
        $groupName=$folderName; // folderName=css
        $groupName = str_replace('_', ' ', $groupName); // folderName=css , replacing _ with space if present
        $markdown .= "- [$groupName](#$folderName)\n"; // Adding following line to markdown: - [css](#css)
    }

    ## Add a new line after the table of contents
    $markdown .= "\n";
    
    foreach ($arrayOfFolderNames as $folderName) { // folderName=css
        $arrayOfMatchingTasksetDirectory = array_filter(   // filters the keys of $associativeArrayOfReqDirs to return only those that contain the substring $group, resulting in an array of matching keys.
            array_keys($associativeArrayOfReqDirs),
            function ($tasksetDirectoryKey) use ($folderName) {
                return strpos($tasksetDirectoryKey, $folderName) !== false;
            }
        ); //    arrayOfMatchingTasksetDirectory = Array ( [0] => taskset_css_essential_training, [1] => taskset_getting_started_with_css, [2] => taskset_intermediate_html_and_css )

        if (empty($arrayOfMatchingTasksetDirectory)) { // if no matching keys are found, the loop continues to the next iteration.
            continue;
        }

        ## Add the folderName name like CSS or Javascript as a heading
        $markdown .= "## $folderName\n\n"; // Adding following line to markdown: ## css

        $markdown .= "[Useful Links](./home/$folderName/ReadMe_static.md)\n"; // Adding following line to markdown: [Useful Links](./home/css/ReadMe.md)
        
        $rowHeader = "";
        
        foreach ($arrayOfMatchingTasksetDirectory as $matchingTasksetDirectory) { // matchingTasksetDirectory=taskset_css_essential_training_css
            // remove taskset_ and $folderName from matchingTasksetDirectory. Note $folderName is always at the end of matchingTasksetDirectory
            $matchingTasksetDirectory = str_replace('taskset_', '', $matchingTasksetDirectory); // matchingTasksetDirectory=css_essential_training_css
            // strip off the $folderName from the end of matchingTasksetDirectory
            $matchingTasksetDirectory = substr($matchingTasksetDirectory, 0, strrpos($matchingTasksetDirectory, $folderName)); // matchingTasksetDirectory=css_essential_training_ 
            // remove trailing _ from matchingTasksetDirectory
            $matchingTasksetDirectory = rtrim($matchingTasksetDirectory, '_'); // matchingTasksetDirectory=css_essential_training
            $rowHeader .= " $matchingTasksetDirectory |"; // Adding following words to rowHeader line: Css_essential_training |
            
        }

        // explode rowHeader with |
        $rowHeader = explode('|', $rowHeader);

        $rowData = "";
        foreach ($arrayOfMatchingTasksetDirectory as $matchingTasksetDirectory) {
            # $rowData .= " --- |";
        }


        foreach ($arrayOfMatchingTasksetDirectory as $matchingTasksetDirectory) { // matchingTasksetDirectory=taskset_css_essential_training
            preg_match('/home\/.*?(?=\/task_)/', $associativeArrayOfReqDirs[$matchingTasksetDirectory][0], $matches);
            $relativePathToTasksetDirectoryReadMeFile = $matches[0]; // relativePathToTasksetDirectoryReadMeFile: home/css/css_essential_training_essential_training/taskset_css_essential_training
            $relativePathToTasksetDirectoryReadMeFile = substr($relativePathToTasksetDirectoryReadMeFile, 0, strrpos($relativePathToTasksetDirectoryReadMeFile, '/')); // relativePathToTasksetDirectoryReadMeFile: home/css/css_essential_training_essential_training  
            $linkToDir = $relativePathToTasksetDirectoryReadMeFile; // linkToDir: home/css/css_essential_training
            $commandToGetAllFoldersInCurrentDir='ls -ltrh ' . $linkToDir . '/taskset*/ | tail -n +2 | wc -l'; # tail -n +2 ignores the first line of output
            $totalNumberOfTasks = shell_exec($commandToGetAllFoldersInCurrentDir);
            // trim whitespace from the beginning and end of the string
            $totalNumberOfTasks = trim($totalNumberOfTasks);
            $rowData .= " [Tasks: $totalNumberOfTasks]($linkToDir) |";
        }

        $rowData = explode('|', $rowData);

        $lastColumnPosition=0;
        $activeColumnPosition=0;
        $maxAllowedColumnsInRow=3;
        // $lenghtOfRowHeader = count($rowHeader);
        $twoSlashNsRequired="No"; // One \n is required the first time, two \n are required after that
        // While $lastColumnPosition is less than the length of the rowHeader array
        while ($lastColumnPosition < count($rowHeader)-1) {
            $maxAllowedColumnsInRow = $lastColumnPosition + $maxAllowedColumnsInRow;
            // Start the row with a pipe
            if ($twoSlashNsRequired=="No") {
                $markdown .= "\n|";
                $twoSlashNsRequired="Yes";
            }
            else {
                $markdown .= "\n\n|";
            }
            // Iterate over the rowHeader array by incrementing $activeColumnPosition and $lastColumnPosition until the maximum number of columns is reached
            for ($activeColumnPosition = $lastColumnPosition; $activeColumnPosition < $maxAllowedColumnsInRow; $activeColumnPosition++) {
                // If rowHeader[$activeColumnPosition] is empty, break the loop
                if (empty($rowHeader[$activeColumnPosition])) {
                    break;
                }
                $markdown .= $rowHeader[$activeColumnPosition];
                $markdown .= "|";
            }

            // Add |---|---| as per number of allowed columns in a row
            $markdown .= "\n";
            $markdown .= "|";
            for ($activeColumnPosition=$lastColumnPosition; $activeColumnPosition < $maxAllowedColumnsInRow; $activeColumnPosition++) {
                // If rowHeader[$activeColumnPosition] is empty, break the loop
                if (empty($rowHeader[$activeColumnPosition])) {
                    break;
                }
                $markdown .= " --- |";
            }


            // Add rowData for each row as per maximum allowed columns
            $markdown .= "\n";
            $markdown .= "|";
            for ($activeColumnPosition = $lastColumnPosition; $activeColumnPosition < $maxAllowedColumnsInRow; $activeColumnPosition++) {
                // If rowHeader[$activeColumnPosition] is empty, break the loop
                if (empty($rowHeader[$activeColumnPosition])) {
                break;
                }
                $markdown .= $rowData[$activeColumnPosition];
                $markdown .= "|";
            }

            $lastColumnPosition=$activeColumnPosition;
            
        }


        $markdown .= "\n";

        // All caps certain words in markdown like AWS, GCP, OS etc
        $markdown = str_replace('Aws', 'AWS', $markdown);
        $markdown = str_replace('Oci', 'OCI', $markdown);
        $markdown = str_replace('Gcp', 'GCP', $markdown);
        $markdown = str_replace('Os', 'OS', $markdown);

    }

    return $markdown;
}

$associativeArrayOfReqDirs = createAssociativeArrayOfReqDirs_v1('.', '/^task_/'); // if first call is for ".", second call is for "./home" and so on as the function is recursive

createIndividualSectionsMarkdown($associativeArrayOfReqDirs);

$globalMarkdownTable = createGlobalMarkdownTable($associativeArrayOfReqDirs);

file_put_contents('ReadMe.md', $globalMarkdownTable);

?>
