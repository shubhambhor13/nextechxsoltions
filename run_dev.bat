@echo off
echo ========================================================
echo   YOUR COMPANY - IT Solutions & AI Automation Portal
echo ========================================================
echo.
echo Starting FastAPI Backend Gateway (Port 8000)...
start "Backend (FastAPI)" cmd /k "python -m uvicorn backend.main:app --host 127.0.0.1 --port 8000 --reload"

timeout /t 2 /nobreak >nul

echo Starting Vite React Frontend (Port 5173)...
start "Frontend (Vite + React)" cmd /k "cd frontend && npm run dev"

echo.
echo ========================================================
echo   Development Servers Launched!
echo   Frontend:  http://localhost:5173
echo   Backend:   http://127.0.0.1:8000
echo   API Docs:  http://127.0.0.1:8000/docs
echo   Admin PIN: admin123  (at /admin)
echo ========================================================
