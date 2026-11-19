@echo off
title NextTechX Solutions - PHP Server
cls
echo ==============================================================
echo        NextTechX Solutions - PHP Production Web Server
echo        Tagline: Your Vision Our Technology
echo ==============================================================
echo.
echo Starting built-in PHP web server at: http://127.0.0.1:8080
echo Document root: %~dp0php
echo SQLite Database: %~dp0php\data\app.db
echo.
echo Open in your browser: http://localhost:8080
echo Press Ctrl+C in this terminal window to stop the server.
echo.

set EXT_DIR=C:\Users\HP\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.3_Microsoft.Winget.Source_8wekyb3d8bbwe\ext
if exist "%EXT_DIR%\php_pdo_sqlite.dll" (
    php -d "extension_dir=%EXT_DIR%" -d extension=php_pdo_sqlite.dll -d extension=php_sqlite3.dll -S 127.0.0.1:8080 -t "%~dp0php"
) else (
    php -S 127.0.0.1:8080 -t "%~dp0php"
)
