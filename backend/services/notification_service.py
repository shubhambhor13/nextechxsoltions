import os
import logging
from datetime import datetime

logger = logging.getLogger("app_notifications")

N8N_WEBHOOK_URL = os.environ.get("N8N_WEBHOOK_URL")

async def trigger_n8n_automation(event_type: str, payload: dict):
    """
    Sends event payload to an n8n workflow webhook if configured,
    or logs cleanly in the automation telemetry stream.
    """
    data = {
        "event": event_type,
        "timestamp": datetime.utcnow().isoformat(),
        "payload": payload,
        "source": "Corporate Portal API"
    }
    
    if N8N_WEBHOOK_URL:
        try:
            import httpx
            async with httpx.AsyncClient(timeout=5.0) as client:
                await client.post(N8N_WEBHOOK_URL, json=data)
                logger.info(f"[n8n Automation Triggered]: {event_type}")
        except Exception as e:
            logger.warning(f"Could not forward to n8n webhook: {e}")
    else:
        logger.info(f"[n8n Event Stream Simulated]: {event_type} - {payload.get('email', 'Guest')}")
    
    return True

