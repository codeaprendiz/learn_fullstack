# Understanding createAssociativeArrayOfReqDirs_v1

> Note: Run the file from the root directory of the repository.

## Run

```bash
$ tree
.
├── ReadMe.md
├── generate-readme.php
└── base
    ├── group_1
    │   └── topic_1
    │       ├── ReadMe.md
    │       └── taskset_topic_1_group_1
    │           └── task_001_one
    │               └── ReadMe.md
    └── group_2
        └── topic_1
            ├── ReadMe.md
            └── taskset_topic_1_group_2
                ├── task_000_zero
                │   └── ReadMe.md
                └── task_001_one
                    └── ReadMe.md

11 directories, 7 files
```

```bash
$ php generate-readme.php



-----------------createAssociativeArrayOfReqDirs_v1(.,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: .
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [2] => ./base
)
childFoldersRelativePathInCurrentFolder: ./base
baseDirectoryName: base
Calling createAssociativeArrayOfReqDirs_v1(./base,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [0] => ./base/group_1
    [1] => ./base/group_2
)
childFoldersRelativePathInCurrentFolder: ./base/group_1
baseDirectoryName: group_1
Calling createAssociativeArrayOfReqDirs_v1(./base/group_1,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_1,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_1
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [0] => ./base/group_1/topic_1
)
childFoldersRelativePathInCurrentFolder: ./base/group_1/topic_1
baseDirectoryName: topic_1
Calling createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_1/topic_1
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [1] => ./base/group_1/topic_1/taskset_topic_1_group_1
)
childFoldersRelativePathInCurrentFolder: ./base/group_1/topic_1/taskset_topic_1_group_1
baseDirectoryName: taskset_topic_1_group_1
Calling createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1/taskset_topic_1_group_1,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1/taskset_topic_1_group_1,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_1/topic_1/taskset_topic_1_group_1
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [0] => ./base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
)
childFoldersRelativePathInCurrentFolder: ./base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
baseDirectoryName: task_001_one
childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
childFoldersRelativePathFromHome: base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
arrayOfPathPartsFromHomeAfterRemovingSlash: Array
(
    [0] => base
    [1] => group_1
    [2] => topic_1
    [3] => taskset_topic_1_group_1
    [4] => task_001_one
)
parentDirOfCurrentTaskDirectory: taskset_topic_1_group_1
associativeArrayOfTasksetDirectories[taskset_topic_1_group_1] not set. Setting it to an empty array
Setting associativeArrayOfTasksetDirectories[taskset_topic_1_group_1]: task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Calling createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1/taskset_topic_1_group_1/task_001_one,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1/taskset_topic_1_group_1/task_001_one,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
)
Returning .... associativeArrayOfTasksetDirectories: Array
(
)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1/taskset_topic_1_group_1/task_001_one,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1/taskset_topic_1_group_1,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_1/topic_1,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_1,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

)
childFoldersRelativePathInCurrentFolder: ./base/group_2
baseDirectoryName: group_2
Calling createAssociativeArrayOfReqDirs_v1(./base/group_2,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_2,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_2
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [0] => ./base/group_2/topic_1
)
childFoldersRelativePathInCurrentFolder: ./base/group_2/topic_1
baseDirectoryName: topic_1
Calling createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_2/topic_1
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [1] => ./base/group_2/topic_1/taskset_topic_1_group_2
)
childFoldersRelativePathInCurrentFolder: ./base/group_2/topic_1/taskset_topic_1_group_2
baseDirectoryName: taskset_topic_1_group_2
Calling createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_2/topic_1/taskset_topic_1_group_2
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
    [0] => ./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
    [1] => ./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
)
childFoldersRelativePathInCurrentFolder: ./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
baseDirectoryName: task_000_zero
childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
childFoldersRelativePathFromHome: base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
arrayOfPathPartsFromHomeAfterRemovingSlash: Array
(
    [0] => base
    [1] => group_2
    [2] => topic_1
    [3] => taskset_topic_1_group_2
    [4] => task_000_zero
)
parentDirOfCurrentTaskDirectory: taskset_topic_1_group_2
associativeArrayOfTasksetDirectories[taskset_topic_1_group_2] not set. Setting it to an empty array
Setting associativeArrayOfTasksetDirectories[taskset_topic_1_group_2]: task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
        )

)
Calling createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
)
Returning .... associativeArrayOfTasksetDirectories: Array
(
)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
        )

)
childFoldersRelativePathInCurrentFolder: ./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
baseDirectoryName: task_001_one
childFoldersAbsolutePathInCurrentFolder: /Users/username/workspace/repoName/phpscript/task_001_createAssociativeArrayOfReqDirs/base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
childFoldersRelativePathFromHome: base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
arrayOfPathPartsFromHomeAfterRemovingSlash: Array
(
    [0] => base
    [1] => group_2
    [2] => topic_1
    [3] => taskset_topic_1_group_2
    [4] => task_001_one
)
parentDirOfCurrentTaskDirectory: taskset_topic_1_group_2
Setting associativeArrayOfTasksetDirectories[taskset_topic_1_group_2]: task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Calling createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one,/^task_/)
array_merge is required to merge the associative arrays



-----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one,/^task_/)--------------------------------------------------------------------------------
currentFoldersRelativePathInConsideration: ./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
arrayOfRelativePathsOfChildFoldersInCurrentFolder: Array
(
)
Returning .... associativeArrayOfTasksetDirectories: Array
(
)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2/task_001_one,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1/taskset_topic_1_group_2,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_2/topic_1,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base/group_2,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(./base,/^task_/)-----------------------------------------------------------------------------


associativeArrayOfTasksetDirectories after merge: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Returning .... associativeArrayOfTasksetDirectories: Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
Ending call for -----------------createAssociativeArrayOfReqDirs_v1(.,/^task_/)-----------------------------------------------------------------------------





-----------------createAssociativeArrayOfReqDirs_v1('.', '/^task_/')--------------------------------------------------------------------------------
Array
(
    [taskset_topic_1_group_1] => Array
        (
            [0] => task_001_one base/group_1/topic_1/taskset_topic_1_group_1/task_001_one
        )

    [taskset_topic_1_group_2] => Array
        (
            [0] => task_000_zero base/group_2/topic_1/taskset_topic_1_group_2/task_000_zero
            [1] => task_001_one base/group_2/topic_1/taskset_topic_1_group_2/task_001_one
        )

)
```