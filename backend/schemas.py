from pydantic import BaseModel, Field
from typing import Optional, List
from datetime import datetime

class ContactMessageCreate(BaseModel):
    name: str = Field(..., min_length=2, max_length=100)
    email: str = Field(..., min_length=5, max_length=120)
    phone: Optional[str] = None
    company: Optional[str] = None
    service_interest: Optional[str] = "General Inquiry"
    message: str = Field(..., min_length=5, max_length=2000)

class ContactMessageOut(BaseModel):
    id: int
    name: str
    email: str
    phone: Optional[str]
    company: Optional[str]
    service_interest: Optional[str]
    message: str
    status: str
    created_at: str

class QuotationRequestCreate(BaseModel):
    name: str = Field(..., min_length=2, max_length=100)
    email: str = Field(..., min_length=5, max_length=120)
    phone: str = Field(..., min_length=6, max_length=25)
    company: Optional[str] = None
    service_category: str
    budget_range: Optional[str] = "Flexible"
    project_timeline: Optional[str] = "Within 1 Month"
    requirements: str = Field(..., min_length=10, max_length=3000)

class QuotationRequestOut(BaseModel):
    id: int
    name: str
    email: str
    phone: str
    company: Optional[str]
    service_category: str
    budget_range: Optional[str]
    project_timeline: Optional[str]
    requirements: str
    status: str
    created_at: str

class ConsultationBookingCreate(BaseModel):
    name: str = Field(..., min_length=2, max_length=100)
    email: str = Field(..., min_length=5, max_length=120)
    phone: str = Field(..., min_length=6, max_length=25)
    company: Optional[str] = None
    topic: str
    preferred_date: str
    preferred_time: str
    notes: Optional[str] = None

class ConsultationBookingOut(BaseModel):
    id: int
    name: str
    email: str
    phone: str
    company: Optional[str]
    topic: str
    preferred_date: str
    preferred_time: str
    notes: Optional[str]
    status: str
    created_at: str

class StudentRegistrationCreate(BaseModel):
    full_name: str = Field(..., min_length=2, max_length=100)
    email: str = Field(..., min_length=5, max_length=120)
    phone: str = Field(..., min_length=8, max_length=25)
    qualification: str
    current_status: str
    course_selected: str
    batch_timing: str
    resume_link: Optional[str] = None
    statement: Optional[str] = None

class StudentRegistrationOut(BaseModel):
    id: int
    full_name: str
    email: str
    phone: str
    qualification: str
    current_status: str
    course_selected: str
    batch_timing: str
    resume_link: Optional[str]
    statement: Optional[str]
    status: str
    created_at: str

class ChatMessageRequest(BaseModel):
    message: str = Field(..., min_length=1, max_length=1000)
    session_id: Optional[str] = "default-guest"

class ChatMessageResponse(BaseModel):
    reply: str
    suggested_actions: Optional[List[str]] = []

class StatusUpdateRequest(BaseModel):
    status: str
