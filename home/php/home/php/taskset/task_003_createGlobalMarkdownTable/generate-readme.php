<?php

/**
Generates a associativeArrayOfReqDirs structure of directories and subdirectories.The createassociativeArrayOfReqDirs function takes two arguments: $currentFoldersRelativePathInConsideration and $directoryRegex. 
    @param string $currentFoldersRelativePathInConsideration represents the path of the directory for which the associativeArrayOfReqDirs structure is generated. 
    @param string $directoryRegex is an optional argument that defines the regular expression pattern used to include directories in the associativeArrayOfReqDirs structure (default value is /^task-/)
    @return string The associativeArrayOfReqDirs structure as a string.
 */

function createAssociativeArrayOfReqDirs_v1($currentFoldersRelativePathInConsideration = './', $directoryRegex = '/^task_/')
{
    $associativeArrayOfTasksetDirectories = [];

    /*
        arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
            (
                [0] => ./home/group_2/group_1/taskset_group_1_group_2/task_000_zero
                [1] => ./home/group_2/group_1/taskset_group_1_group_2/task_001_one
            )
    */
    $arrayOfRelativePathsOfChildFoldersInCurrentFolder = array_filter(
                                    glob($currentFoldersRelativePathInConsideration . '/*'), // The glob function in PHP searches for all files and directories that match the given pattern.
                                    'is_dir'
                                    );
    sort($arrayOfRelativePathsOfChildFoldersInCurrentFolder);

    foreach ($arrayOfRelativePathsOfChildFoldersInCurrentFolder as $childFoldersRelativePathInCurrentFolder) { // childFoldersRelativePathInCurrentFolder: ./home/group_2/group_1/taskset_group_1_group_2/task_000_zero
        $baseDirectoryName = trim(basename($childFoldersRelativePathInCurrentFolder)); // baseDirectoryName: task_000_zero

        if (preg_match($directoryRegex, $baseDirectoryName)) {
            $childFoldersAbsolutePathInCurrentFolder = realpath($childFoldersRelativePathInCurrentFolder); // childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/home/group_2/group_1/taskset_group_1_group_2/task_000_zero
            $childFoldersRelativePathFromHome = substr($childFoldersAbsolutePathInCurrentFolder, strpos($childFoldersAbsolutePathInCurrentFolder, 'home')); // childFoldersRelativePathFromHome: home/group_2/group_1/taskset_group_1_group_2/task_000_zero
            
            /*
                arrayOfPathPartsFromHomeAfterRemovingSlash: Array
                (
                    [0] => home
                    [1] => group_2
                    [2] => group_1
                    [3] => taskset_group_1_group_2
                    [4] => task_000_zero
                )
            */
            $arrayOfPathPartsFromHomeAfterRemovingSlash = explode(DIRECTORY_SEPARATOR, $childFoldersRelativePathFromHome);
            $parentDirOfCurrentTaskDirectory = $arrayOfPathPartsFromHomeAfterRemovingSlash[count($arrayOfPathPartsFromHomeAfterRemovingSlash) - 2]; // parentDirOfCurrentTaskDirectory: taskset_group_1_group_2

            if (!isset($associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory])) { // if not initialized, initialize it as an empty array
                $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory] = []; // associativeArrayOfTasksetDirectories[taskset_group_1_group_2]: task_000_zero home/group_2/group_1/taskset_group_1_group_2/task_000_zero
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
        preg_match('/home\/.*?(?=\/task_)/', $arrayOfDirectoriesInTasksetDirectory[0], $matches);
        $relativePathToTasksetDirectoryReadMeFile = $matches[0];
        $relativePathToTasksetDirectoryReadMeFile = substr($relativePathToTasksetDirectoryReadMeFile, 0, strrpos($relativePathToTasksetDirectoryReadMeFile, '/'));
        $markdown .= "# $tasksetDirectoryKey\n\n> Auto generated ReadMe\n\n";
        $markdown .= "| Task | Description |\n";
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
        $markdown .= "\n";
        file_put_contents($relativePathToTasksetDirectoryReadMeFile . '/ReadMe.md', $markdown);
    }
}

function createGlobalMarkdownTable($associativeArrayOfReqDirs) {

    $markdown = "# Home \n\n> Auto generated ReadMe\n\n";
    
    // ls -ltrh home | egrep -v "total" | awk '{print "\"" $9 "\","}' | sort
    $arrayOfGroupNames = array(
        "group_1",
        "group_2",
    );
    
    foreach ($arrayOfGroupNames as $group) { // group=group_1
        $groupName=$group; // groupName=group_1
        $groupName = str_replace('_', ' ', $groupName); // groupName=group 1
        $groupName = ucwords($groupName); // groupName=Group 1
        $group = ucwords($group);   // group=Group_1
        $markdown .= "- [$groupName](#$group)\n"; // Adding following line to markdown: - [Group 1](#Group_1)
    }

    $markdown .= "\n";
    
    foreach ($arrayOfGroupNames as $group) { // group=group_1
        $arrayOfMatchingTasksetDirectory = array_filter(   // filters the keys of $associativeArrayOfReqDirs to return only those that contain the substring $group, resulting in an array of matching keys.
            array_keys($associativeArrayOfReqDirs),
            function ($tasksetDirectoryKey) use ($group) {
                return strpos($tasksetDirectoryKey, $group) !== false;
            }
        ); //    arrayOfMatchingTasksetDirectory =  Array([0] => taskset_topic_1_group_1 )

        if (empty($arrayOfMatchingTasksetDirectory)) { // if no matching keys are found, the loop continues to the next iteration.
            continue;
        }

        $group = ucwords($group); // group=Group_1
        $markdown .= "## $group\n\n"; // Adding following line to markdown: ## Group 1

        $markdown .= "|";  // Adding following line to markdown: |
        foreach ($arrayOfMatchingTasksetDirectory as $matchingTasksetDirectory) { // matchingTasksetDirectory=taskset_topic_1_group_1
            
            $matchingTasksetDirectory = explode('_', $matchingTasksetDirectory); // matchingTasksetDirectory=Array ( [0] => taskset, [1] => topic, [2] => 1, [3] => group, [4] => 1 )
            $matchingTasksetDirectory = array_slice($matchingTasksetDirectory, 1); // matchingTasksetDirectory=Array ( [0] => topic, [1] => 1, [2] => group, [3] => 1 )
            $matchingTasksetDirectory = implode('_', $matchingTasksetDirectory); // matchingTasksetDirectory=topic_1_group_1
            $group = strtolower($group); // group=group_1
            $matchingTasksetDirectory = str_replace("_$group", '', $matchingTasksetDirectory); // matchingTasksetDirectory=topic_1
            $matchingTasksetDirectory = ucwords($matchingTasksetDirectory); // matchingTasksetDirectory=Topic_1
            $markdown .= " $matchingTasksetDirectory |"; // Adding following line to markdown: Topic 1 |
            
        }
        $markdown .= "\n"; // Adding following line to markdown: \n
        $markdown .= "|"; // Adding following line to markdown: | 

        foreach ($arrayOfMatchingTasksetDirectory as $matchingTasksetDirectory) {
            $markdown .= " --- |"; // Adding following line to markdown:  --- |
        }

        $markdown .= "\n";
        $markdown .= "|";

        foreach ($arrayOfMatchingTasksetDirectory as $matchingTasksetDirectory) { // matchingTasksetDirectory=taskset_topic_1_group_1
            preg_match('/home\/.*?(?=\/task_)/', $associativeArrayOfReqDirs[$matchingTasksetDirectory][0], $matches);
            $relativePathToTasksetDirectoryReadMeFile = $matches[0]; // relativePathToTasksetDirectoryReadMeFile: home/group_1/topic_1/taskset_topic_1_group_1
            $relativePathToTasksetDirectoryReadMeFile = substr($relativePathToTasksetDirectoryReadMeFile, 0, strrpos($relativePathToTasksetDirectoryReadMeFile, '/')); // relativePathToTasksetDirectoryReadMeFile: home/group_1/topic_1        
            $linkToDir = $relativePathToTasksetDirectoryReadMeFile; // linkToDir: home/group_1/topic_1
            $markdown .= " [Practice Tasks]($linkToDir) |"; // Adding following line to markdown: [Practice Tasks](home/group_1/topic_1) |
        }

        $markdown .= "\n\n";

        // All caps certain words in markdown like AWS, GCP, OS etc
        $markdown = str_replace('Aws', 'AWS', $markdown);
        $markdown = str_replace('Oci', 'OCI', $markdown);
        $markdown = str_replace('Gcp', 'GCP', $markdown);
        $markdown = str_replace('Os', 'OS', $markdown);

    }

    return $markdown;
}

$associativeArrayOfReqDirs = createAssociativeArrayOfReqDirs_v1('.', '/^task_/'); // if first call is for ".", second call is for "./home" and so on as the function is recursive

print_r($associativeArrayOfReqDirs);
createIndividualSectionsMarkdown($associativeArrayOfReqDirs);

$globalMarkdownTable = createGlobalMarkdownTable($associativeArrayOfReqDirs);

file_put_contents('ReadMe.md', $globalMarkdownTable);

?>
