#!/bin/bash

SOURCE_ORG=$1

if [ -z "$1" ]; then
    echo "Usage: bash rsync-java.sh <source_org>"
    exit 1
fi

SYNC_FROM_DIR_THAT_MUST_NOT_CHANGE="$HOME/workspace/$1/learn_go"
SYNC_TO_DIR_THAT_WILL_CHANGE="$HOME/workspace/codeaprendiz/learn_fullstack/go"


# Use the rsync command to sync the directories
# --delete option deletes files that don't exist in source directory
# --exclude option to exclude the .git folder
# -a stands for "archive" and syncs directories recursively and preserves symbolic links, special and device files, modification times, group, owner, and permissions.
# -r stands for "recursive" and copies directories recursively.
# -v stands for "verbose" and provides detailed output.
rsync -arv --delete --exclude='.git' "${SYNC_FROM_DIR_THAT_MUST_NOT_CHANGE}/" "${SYNC_TO_DIR_THAT_WILL_CHANGE}"
