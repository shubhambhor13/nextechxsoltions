import os
import sys
import uvicorn

if __name__ == "__main__":
    print("=" * 60)
    print(" NextTechX Solutions - Production Server (Unified Web & API)")
    print(" Tagline: Your Vision Our Technology")
    print(" Serving on: http://127.0.0.1:8000")
    print(" API Documentation: http://127.0.0.1:8000/docs")
    print("=" * 60)
    
    # Ensure current directory is on python path
    sys.path.insert(0, os.path.abspath(os.path.dirname(__file__)))
    
    uvicorn.run("backend.main:app", host="127.0.0.1", port=8000, reload=True)

