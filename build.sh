#!/bin/sh
set -e
echo "Building NexTechX Solutions frontend..."
cd frontend
npm install
npm run build
echo "Build completed successfully."
