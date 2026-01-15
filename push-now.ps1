# Push to GitHub Script
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host "  Pushing to GitHub..." -ForegroundColor Cyan
Write-Host "=====================================" -ForegroundColor Cyan
Write-Host ""

# Check remote
Write-Host "Remote repository:" -ForegroundColor Yellow
git remote -v
Write-Host ""

# Check branch
Write-Host "Current branch:" -ForegroundColor Yellow
git branch --show-current
Write-Host ""

# Check commits
Write-Host "Recent commits:" -ForegroundColor Yellow
git log --oneline -3
Write-Host ""

# Push
Write-Host "Pushing to GitHub..." -ForegroundColor Green
Write-Host ""

try {
    git push -u origin main 2>&1
    
    if ($LASTEXITCODE -eq 0) {
        Write-Host ""
        Write-Host "=====================================" -ForegroundColor Green
        Write-Host "  Push Successful! 🎉" -ForegroundColor Green
        Write-Host "=====================================" -ForegroundColor Green
        Write-Host ""
        Write-Host "Visit your repository:" -ForegroundColor Yellow
        Write-Host "https://github.com/DYBInh2k5/Laravel-Blog" -ForegroundColor White
        Write-Host ""
    } else {
        Write-Host ""
        Write-Host "=====================================" -ForegroundColor Red
        Write-Host "  Push Failed!" -ForegroundColor Red
        Write-Host "=====================================" -ForegroundColor Red
        Write-Host ""
        Write-Host "Please try manually:" -ForegroundColor Yellow
        Write-Host "git push -u origin main" -ForegroundColor White
        Write-Host ""
        Write-Host "Or use GitHub Desktop" -ForegroundColor Yellow
        Write-Host ""
    }
} catch {
    Write-Host "Error: $_" -ForegroundColor Red
}

Write-Host ""
Write-Host "Press any key to continue..."
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
