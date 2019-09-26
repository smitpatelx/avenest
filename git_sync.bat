@echo off

set git_init=git init
set git_add=git add *
<<<<<<< HEAD
set git_commit=git commit -m "Edited by Mike Cusson"
=======
set git_commit=git commit -m "Edited by roshan persaud"
>>>>>>> 3206b9a0e5e6dcd1a05417fb7c6f523a4db10365
set git_push=git push
set git_pull=git pull

CALL %git_pull%
CALL %git_add%
CALL %git_commit%
CALL %git_push%

pause