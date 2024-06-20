<?php

/**
Generates a tree structure of directories and subdirectories.The createTree function takes two arguments: $currentFoldersRelativePathInConsideration and $directoryRegex. 
    @param string $currentFoldersRelativePathInConsideration represents the path of the directory for which the tree structure is generated. 
    @param string $directoryRegex is an optional argument that defines the regular expression pattern used to include directories in the tree structure (default value is /^task-/)
    @return string The tree structure as a string.
 */

function createAssociativeArrayOfReqDirs_v1($currentFoldersRelativePathInConsideration = './', $directoryRegex = '/^task_/')
{
    print("\n\n\n-----------------createAssociativeArrayOfReqDirs_v1($currentFoldersRelativePathInConsideration,$directoryRegex)--------------------------------------------------------------------------------\n");
    print("currentFoldersRelativePathInConsideration: $currentFoldersRelativePathInConsideration\n"); // currentFoldersRelativePathInConsideration: ./base/group_2/topic_1/taskset_topic_1_group_2
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
    print("arrayOfRelativePathsOfChildFoldersInCurrentFolder: ");
    print_r($arrayOfRelativePathsOfChildFoldersInCurrentFolder);

    sort($arrayOfRelativePathsOfChildFoldersInCurrentFolder);

    foreach ($arrayOfRelativePathsOfChildFoldersInCurrentFolder as $childFoldersRelativePathInCurrentFolder) { // childFoldersRelativePathInCurrentFolder: ./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
        print("childFoldersRelativePathInCurrentFolder: $childFoldersRelativePathInCurrentFolder\n");
        $baseDirectoryName = trim(basename($childFoldersRelativePathInCurrentFolder)); // baseDirectoryName: task_000_zero
        print("baseDirectoryName: $baseDirectoryName\n");

        if (preg_match($directoryRegex, $baseDirectoryName)) {
            $childFoldersAbsolutePathInCurrentFolder = realpath($childFoldersRelativePathInCurrentFolder); // childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            print("childFoldersAbsolutePathInCurrentFolder: $childFoldersAbsolutePathInCurrentFolder\n");
            $childFoldersRelativePathFromHome = substr($childFoldersAbsolutePathInCurrentFolder, strpos($childFoldersAbsolutePathInCurrentFolder, 'base')); // childFoldersRelativePathFromHome: base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            print("childFoldersRelativePathFromHome: $childFoldersRelativePathFromHome\n");
            
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
            print("arrayOfPathPartsFromHomeAfterRemovingSlash: ");
            print_r($arrayOfPathPartsFromHomeAfterRemovingSlash);
            $parentDirOfCurrentTaskDirectory = $arrayOfPathPartsFromHomeAfterRemovingSlash[count($arrayOfPathPartsFromHomeAfterRemovingSlash) - 2]; // parentDirOfCurrentTaskDirectory: taskset_topic_1_group_2
            print("parentDirOfCurrentTaskDirectory: $parentDirOfCurrentTaskDirectory\n");

            if (!isset($associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory])) { // if not initialized, initialize it as an empty array
                print("associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory] not set. Setting it to an empty array\n");
                $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory] = []; // associativeArrayOfTasksetDirectories[taskset_topic_1_group_2]: task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            }
            print("Setting associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory]: $baseDirectoryName $childFoldersRelativePathFromHome\n");
            $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory][] = "$baseDirectoryName $childFoldersRelativePathFromHome"; // $associativeArrayOfTasksetDirectories[$parentDirOfCurrentTaskDirectory][]: The [] notation is used to append an element to the array associated with the key $parentDirOfCurrentTaskDirectory. 
            print("associativeArrayOfTasksetDirectories: ");
            print_r($associativeArrayOfTasksetDirectories);
        }

        if (!empty(glob("$childFoldersRelativePathInCurrentFolder/*"))) { // The glob function in PHP searches for all files and directories that match the given pattern. The !empty(...) condition checks if the array returned by glob is not empty, meaning that there are files or subdirectories present in the directory.
            print("Calling createAssociativeArrayOfReqDirs_v1($childFoldersRelativePathInCurrentFolder,$directoryRegex)\n");
            print("array_merge is required to merge the associative arrays\n");
            $associativeArrayOfTasksetDirectories = array_merge($associativeArrayOfTasksetDirectories, createAssociativeArrayOfReqDirs_v1($childFoldersRelativePathInCurrentFolder));
            print("associativeArrayOfTasksetDirectories after merge: ");
            print_r($associativeArrayOfTasksetDirectories);
        }
    }
    print("Returning .... associativeArrayOfTasksetDirectories: ");
    print_r($associativeArrayOfTasksetDirectories);
    print("Ending call for -----------------createAssociativeArrayOfReqDirs_v1($currentFoldersRelativePathInConsideration,$directoryRegex)-----------------------------------------------------------------------------\n\n\n");
    return $associativeArrayOfTasksetDirectories;
}

$associativeArrayOfReqDirs = createAssociativeArrayOfReqDirs_v1('.', '/^task_/'); // if first call is for ".", second call is for "./base" and so on as the function is recursive

print("\n\n\n-----------------createAssociativeArrayOfReqDirs_v1('.', '/^task_/')--------------------------------------------------------------------------------\n");
print_r($associativeArrayOfReqDirs);