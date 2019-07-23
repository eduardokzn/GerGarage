#!/bin/bash

echo “Opening the webdevdb database in this folder”

#ref: https://stackoverflow.com/questions/59895/getting-the-source-directory-of-a-bash-script-from-within

thisDir="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

# echo "Current Dir: "
# echo $thisDir

cd $thisDir

sqlite3 webdevdb

echo "Press ENTER to close window ..."
read aKey