import os
from fastapi import FastAPI, Request
from fastapi.middleware.cors import CORSMiddleware
from fastapi.staticfiles import StaticFiles
from fastapi.responses import FileResponse
from backend.database import init_db
from backend.routers import (
    contact,
    quotation,
    consultation,
    training,
    portfolio,
    ai_chat,
    careers,
    cms
)

app = FastAPI(
    title="Corporate API & Web Portal",
    description="Enterprise API powering Corporate Portal, AI Automation, Data Annotation, Training & Management System.",
    version="2.0.0"
)

# Enable CORS
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Initialize database schema and seeds on startup
@app.on_event("startup")
def on_startup():
    init_db()

@app.get("/api/health")
def health_check():
    return {
        "status": "online",
        "service": "API Gateway",
        "version": "2.0.0",
        "automation_engine": "n8n Ready",
        "ai_engine": "Active"
    }

# Register Routers
app.include_router(contact.router)
app.include_router(quotation.router)
app.include_router(consultation.router)
app.include_router(training.router)
app.include_router(portfolio.router)
app.include_router(ai_chat.router)
app.include_router(careers.router)
app.include_router(cms.router)

# Mount Frontend Production Build if present
dist_path = os.path.join(os.path.dirname(os.path.dirname(__file__)), "frontend", "dist")

if os.path.exists(dist_path):
    assets_path = os.path.join(dist_path, "assets")
    if os.path.exists(assets_path):
        app.mount("/assets", StaticFiles(directory=assets_path), name="assets")

    @app.get("/{full_path:path}")
    async def serve_spa(full_path: str):
        # Allow API routes to be handled by routers
        if full_path.startswith("api"):
            return {"error": "API route not found"}
        
        file_path = os.path.join(dist_path, full_path)
        if os.path.isfile(file_path):
            return FileResponse(file_path)
        
        index_file = os.path.join(dist_path, "index.html")
        return FileResponse(index_file)

if __name__ == "__main__":
    import uvicorn
    uvicorn.run("backend.main:app", host="127.0.0.1", port=8000, reload=True)
