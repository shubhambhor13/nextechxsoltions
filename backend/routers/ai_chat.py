from fastapi import APIRouter
from backend.schemas import ChatMessageRequest, ChatMessageResponse
from backend.services.ai_service import generate_ai_response
from backend.database import get_db_connection

router = APIRouter(prefix="/api/chat", tags=["AI Chatbot"])

@router.post("", response_model=ChatMessageResponse)
async def chat_with_ai(data: ChatMessageRequest):
    # Log user message
    conn = get_db_connection()
    cursor = conn.cursor()
    cursor.execute("""
        INSERT INTO chat_logs (session_id, role, content)
        VALUES (?, 'user', ?)
    """, (data.session_id, data.message))
    conn.commit()
    
    # Generate response
    ai_result = await generate_ai_response(data.message)
    
    # Log assistant reply
    cursor.execute("""
        INSERT INTO chat_logs (session_id, role, content)
        VALUES (?, 'assistant', ?)
    """, (data.session_id, ai_result["reply"]))
    conn.commit()
    conn.close()
    
    return ChatMessageResponse(
        reply=ai_result["reply"],
        suggested_actions=ai_result.get("suggested_actions", [])
    )

