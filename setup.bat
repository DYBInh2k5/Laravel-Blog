@echo off
echo ==================================
echo   Laravel Blog - Auto Setup
echo ==================================
echo.

REM Check if vendor exists
if exist "vendor\autoload.php" (
    echo [OK] Vendor already installed
) else (
    echo [...] Installing Composer dependencies...
    echo       This may take a few minutes...
    composer install --no-interaction --prefer-dist
    if errorlevel 1 (
        echo [ERROR] Composer install failed
        echo         Try: composer install manually
        pause
        exit /b 1
    )
    echo [OK] Composer install completed
)

echo.

REM Generate APP_KEY
findstr /C:"APP_KEY=base64:" .env >nul 2>&1
if %errorlevel% equ 0 (
    echo [OK] APP_KEY already set
) else (
    echo [...] Generating APP_KEY...
    php artisan key:generate
    echo [OK] APP_KEY generated
)

echo.

REM Create SQLite database
if exist "database\database.sqlite" (
    echo [OK] Database file exists
) else (
    echo [...] Creating SQLite database...
    type nul > database\database.sqlite
    echo [OK] Database created
)

echo.

REM Run migrations
echo [...] Running migrations...
php artisan migrate --force
if errorlevel 1 (
    echo [WARNING] Migrations may have failed
) else (
    echo [OK] Migrations completed
)

echo.

REM Seed data
echo [...] Seeding sample data...
php artisan db:seed --class=PostSeeder --force
if errorlevel 1 (
    echo [WARNING] Seeding may have failed
) else (
    echo [OK] Sample data created
)

echo.
echo ==================================
echo   Setup Complete! 🎉
echo ==================================
echo.
echo To start the server, run:
echo   php artisan serve
echo.
echo Then visit:
echo   http://localhost:8000
echo.
pause
