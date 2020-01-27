@echo off

set git_init=git init
set git_add=git add *
set git_commit=git commit -m "Edited by Mike Cusson"
set git_push=git push
set git_pull=git pull

CALL %git_pull%
CALL %git_add%
CALL %git_commit%
CALL %git_push%

pause