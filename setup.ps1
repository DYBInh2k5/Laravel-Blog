# Laravel Blog Setup Script
Write-Host "==================================" -ForegroundColor Cyan
Write-Host "  Laravel Blog - Auto Setup" -ForegroundColor Cyan
Write-Host "==================================" -ForegroundColor Cyan
Write-Host ""

# Check if vendor exists
if (Test-Path "vendor\autoload.php") {
    Write-Host "✓ Vendor already installed" -ForegroundColor Green
} else {
    Write-Host "⏳ Installing Composer dependencies..." -ForegroundColor Yellow
    Write-Host "   This may take a few minutes..." -ForegroundColor Yellow
    composer install --no-interaction --prefer-dist
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host "✓ Composer install completed" -ForegroundColor Green
    } else {
        Write-Host "✗ Composer install failed" -ForegroundColor Red
        Write-Host "  Try: composer install manually" -ForegroundColor Yellow
        exit 1
    }
}

Write-Host ""

# Generate APP_KEY
if (Select-String -Path ".env" -Pattern "APP_KEY=base64:" -Quiet) {
    Write-Host "✓ APP_KEY already set" -ForegroundColor Green
} else {
    Write-Host "⏳ Generating APP_KEY..." -ForegroundColor Yellow
    php artisan key:generate
    Write-Host "✓ APP_KEY generated" -ForegroundColor Green
}

Write-Host ""

# Create SQLite database
if (Test-Path "database\database.sqlite") {
    Write-Host "✓ Database file exists" -ForegroundColor Green
} else {
    Write-Host "⏳ Creating SQLite database..." -ForegroundColor Yellow
    New-Item -Path "database\database.sqlite" -ItemType File -Force | Out-Null
    Write-Host "✓ Database created" -ForegroundColor Green
}

Write-Host ""

# Run migrations
Write-Host "⏳ Running migrations..." -ForegroundColor Yellow
php artisan migrate --force

if ($LASTEXITCODE -eq 0) {
    Write-Host "✓ Migrations completed" -ForegroundColor Green
} else {
    Write-Host "⚠ Migrations may have failed" -ForegroundColor Yellow
}

Write-Host ""

# Seed data
Write-Host "⏳ Seeding sample data..." -ForegroundColor Yellow
php artisan db:seed --class=PostSeeder --force

if ($LASTEXITCODE -eq 0) {
    Write-Host "✓ Sample data created" -ForegroundColor Green
} else {
    Write-Host "⚠ Seeding may have failed" -ForegroundColor Yellow
}

Write-Host ""
Write-Host "==================================" -ForegroundColor Cyan
Write-Host "  Setup Complete! 🎉" -ForegroundColor Green
Write-Host "==================================" -ForegroundColor Cyan
Write-Host ""
Write-Host "To start the server, run:" -ForegroundColor Yellow
Write-Host "  php artisan serve" -ForegroundColor White
Write-Host ""
Write-Host "Then visit:" -ForegroundColor Yellow
Write-Host "  http://localhost:8000" -ForegroundColor White
Write-Host ""
