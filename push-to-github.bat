@echo off
echo ====================================
echo   Push Laravel Blog to GitHub
echo ====================================
echo.
echo Repository: https://github.com/DYBInh2k5/Laravel-Blog
echo.

REM Check if git is installed
git --version >nul 2>&1
if errorlevel 1 (
    echo [ERROR] Git is not installed!
    echo         Download from: https://git-scm.com/
    pause
    exit /b 1
)

echo [OK] Git is installed
echo.

REM Check current branch
echo Current branch:
git branch --show-current
echo.

REM Show status
echo Git status:
git status --short
echo.

REM Confirm push
set /p confirm="Do you want to push to GitHub? (y/n): "
if /i not "%confirm%"=="y" (
    echo Push cancelled.
    pause
    exit /b 0
)

echo.
echo [INFO] Pushing to GitHub...
echo.

REM Push to GitHub
git push -u origin main

if errorlevel 1 (
    echo.
    echo [ERROR] Push failed!
    echo.
    echo Possible reasons:
    echo 1. Authentication failed - Use Personal Access Token
    echo 2. SSH key not configured
    echo 3. Network issues
    echo.
    echo See PUSH_TO_GITHUB.md for detailed instructions.
    echo.
    pause
    exit /b 1
)

echo.
echo ====================================
echo   Push Successful! 🎉
echo ====================================
echo.
echo Your code is now on GitHub:
echo https://github.com/DYBInh2k5/Laravel-Blog
echo.
echo Next steps:
echo 1. Visit the repository URL
echo 2. Check if all files are there
echo 3. Add description and topics
echo 4. Share with friends!
echo.
pause
