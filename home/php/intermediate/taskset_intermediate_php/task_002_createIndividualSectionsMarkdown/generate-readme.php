<?php

/**
Generates a tree structure of directories and subdirectories.The createTree function takes two arguments: $currentFoldersRelativePathInConsideration and $directoryRegex. 
    @param string $currentFoldersRelativePathInConsideration represents the path of the directory for which the tree structure is generated. 
    @param string $directoryRegex is an optional argument that defines the regular expression pattern used to include directories in the tree structure (default value is /^task-/)
    @return string The tree structure as a string.
 */

function createAssociativeArrayOfReqDirs_v1($currentFoldersRelativePathInConsideration = './', $directoryRegex = '/^task_/')
{
    $associativeArrayOfTasksetDirectories = [];

    /*
        arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
            (
                [0] => ./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
                [1] => ./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
            )
    */
    $arrayOfRelativePathsOfChildFoldersInCurrentFolder = array_filter(
                                    glob($currentFoldersRelativePathInConsideration . '/*'), // The glob function in PHP searches for all files and directories that match the given pattern.
                                    'is_dir'
                                    );
    sort($arrayOfRelativePathsOfChildFoldersInCurrentFolder);

    foreach ($arrayOfRelativePathsOfChildFoldersInCurrentFolder as $childFoldersRelativePathInCurrentFolder) { // childFoldersRelativePathInCurrentFolder: ./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
        $baseDirectoryName = trim(basename($childFoldersRelativePathInCurrentFolder)); // baseDirectoryName: task_000_zero

        if (preg_match($directoryRegex, $baseDirectoryName)) {
            $childFoldersAbsolutePathInCurrentFolder = realpath($childFoldersRelativePathInCurrentFolder); // childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            $childFoldersRelativePathFromHome = substr($childFoldersAbsolutePathInCurrentFolder, strpos($childFoldersAbsolutePathInCurrentFolder, 'base')); // childFoldersRelativePathFromHome: base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            
            /*
                arrayOfPathPartsFromHomeAfterRemovingSlash: Array
                (
                    [0] => base
                    [1] => group_2
                    [2] => topic_1
                    [3] => taskset_topic_1_group_2
                    [4] => task_000_zero
                )
            */
            $arrayOfPathPartsFromHomeAfterRemovingSlash = explode(DIRECTORY_SEPARATOR, $childFoldersRelativePathFromHome);
            $parentDirOfCurrentTaskDirectory = $arrayOfPathPartsFromHomeAfterRemovingSlash[count($arrayOfPathPartsFromHomeAfterRemovingSlash) - 2]; // parentDirOfCurrentTaskDirectory: taskset_topic_1_group_2

            if (!isset($associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory])) { // if not initialized, initialize it as an empty array
                $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory] = []; // associativeArrayOfTasksetDirectories[taskset_topic_1_group_2]: task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
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
        print("\n\n\n---------------tasksetDirectoryKey-------------$tasksetDirectoryKey-----------------------------------------------------------\n");
        print("---------------arrayOfDirectoriesInTasksetDirectory--------------------------------------------------------------------------------\n");
        print_r($arrayOfDirectoriesInTasksetDirectory);
        print("arrayOfDirectoriesInTasksetDirectory[0]: $arrayOfDirectoriesInTasksetDirectory[0]");
        preg_match('/base\/.*?(?=\/task_)/', $arrayOfDirectoriesInTasksetDirectory[0], $matches);
        $relativePathToTasksetDirectoryReadMeFile = $matches[0];
        print("--------relativePathToTasksetDirectoryReadMeFile------------$relativePathToTasksetDirectoryReadMeFile----\n");
        $relativePathToTasksetDirectoryReadMeFile = substr($relativePathToTasksetDirectoryReadMeFile, 0, strrpos($relativePathToTasksetDirectoryReadMeFile, '/'));
        print("--------relativePathToTasksetDirectoryReadMeFile------------$relativePathToTasksetDirectoryReadMeFile----\n");
        $markdown .= "# $tasksetDirectoryKey\n\n> Auto generated ReadMe\n\n";
        $markdown .= "| Task | Description |\n";
        $markdown .= "| --- | --- |\n";
        foreach ($arrayOfDirectoriesInTasksetDirectory as $taskDirectoryChildFolderConcatenatedWithRelativePath) {
            print("--------taskDirectoryChildFolderConcatenatedWithRelativePath------------$taskDirectoryChildFolderConcatenatedWithRelativePath----\n");
            $taskNumber = substr($taskDirectoryChildFolderConcatenatedWithRelativePath, strpos($taskDirectoryChildFolderConcatenatedWithRelativePath, 'task_'), 8);
            print("--------taskNumber------------$taskNumber----\n");
            # $taskNumber = str_replace('-', '', $taskNumber);
            # print("--------taskNumber------------$taskNumber----\n");
            $arrayOfChildFolderNameAndItsRelativePath=explode(' ', $taskDirectoryChildFolderConcatenatedWithRelativePath);
            print("--------arrayOfChildFolderNameAndItsRelativePath---------------\n");
            $childFolderName=$arrayOfChildFolderNameAndItsRelativePath[0];
            print("--------childFolderName------------$childFolderName----\n");
            print_r($arrayOfChildFolderNameAndItsRelativePath);
            $childFolderName=$arrayOfChildFolderNameAndItsRelativePath[0];
            print("--------childFolderName------------$childFolderName----\n");
            $arrayOfChildFoldersRelativePathExplodedWithSlash = explode('/', $arrayOfChildFolderNameAndItsRelativePath[1]);
            print("--------arrayOfChildFoldersRelativePathExplodedWithSlash---------------\n");
            print_r($arrayOfChildFoldersRelativePathExplodedWithSlash);
            $tasksetDirectoryName = $arrayOfChildFoldersRelativePathExplodedWithSlash[count($arrayOfChildFoldersRelativePathExplodedWithSlash) - 2]; // second last element
            print("--------tasksetDirectoryName------------$tasksetDirectoryName----\n");
            print("Adding following row to markdown\n");
            print("| $taskNumber | [$childFolderName]($tasksetDirectoryName/$childFolderName) |\n");
            $markdown .= "| $taskNumber | [$childFolderName]($tasksetDirectoryName/$childFolderName) |\n";
        }
        $markdown .= "\n";


        file_put_contents($relativePathToTasksetDirectoryReadMeFile . '/ReadMe.md', $markdown);
    }
}

$associativeArrayOfReqDirs = createAssociativeArrayOfReqDirs_v1('.', '/^task_/'); // if first call is for ".", second call is for "./base" and so on as the function is recursive

createIndividualSectionsMarkdown($associativeArrayOfReqDirs);

?>
