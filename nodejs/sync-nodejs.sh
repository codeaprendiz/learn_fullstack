#!/bin/bash

TARGET_STATE_DIRECTORY="$HOME/workspace/Frontend-Backend-DevOps/learn-nodejs"
DIRECTORY_THAT_REQUIRES_SYNC="$HOME/workspace/codeaprendiz/learn-fullstack/nodejs"


# Use the rsync command to sync the directories
# --delete option deletes files that don't exist in source directory
# --exclude option to exclude the .git folder
# -a stands for "archive" and syncs directories recursively and preserves symbolic links, special and device files, modification times, group, owner, and permissions.
# -r stands for "recursive" and copies directories recursively.
# -v stands for "verbose" and provides detailed output.
rsync -arv --delete --exclude='.git' "${TARGET_STATE_DIRECTORY}/" "${DIRECTORY_THAT_REQUIRES_SYNC}"
