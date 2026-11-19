// API Service Client
const BASE_URL = import.meta.env.VITE_API_BASE_URL || '/api';

export const api = {
  // Contact
  async submitContact(data) {
    const res = await fetch(`${BASE_URL}/contact`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });
    if (!res.ok) {
      const err = await res.json().catch(() => ({}));
      throw new Error(err.detail || 'Failed to submit contact message');
    }
    return res.json();
  },

  async getContactMessages() {
    const res = await fetch(`${BASE_URL}/contact`);
    if (!res.ok) throw new Error('Failed to fetch contact inquiries');
    return res.json();
  },

  // Quotation
  async submitQuotation(data) {
    const res = await fetch(`${BASE_URL}/quotation`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });
    if (!res.ok) {
      const err = await res.json().catch(() => ({}));
      throw new Error(err.detail || 'Failed to submit quotation request');
    }
    return res.json();
  },

  async getQuotations() {
    const res = await fetch(`${BASE_URL}/quotation`);
    if (!res.ok) throw new Error('Failed to fetch quotations');
    return res.json();
  },

  // Consultation
  async bookConsultation(data) {
    const res = await fetch(`${BASE_URL}/consultation`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });
    if (!res.ok) {
      const err = await res.json().catch(() => ({}));
      throw new Error(err.detail || 'Failed to book consultation');
    }
    return res.json();
  },

  async getConsultations() {
    const res = await fetch(`${BASE_URL}/consultation`);
    if (!res.ok) throw new Error('Failed to fetch consultations');
    return res.json();
  },

  // Training & Courses
  async getCourses() {
    const res = await fetch(`${BASE_URL}/training/courses`);
    if (!res.ok) throw new Error('Failed to fetch courses');
    return res.json();
  },

  async registerStudent(data) {
    const res = await fetch(`${BASE_URL}/training/register`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(data),
    });
    if (!res.ok) {
      const err = await res.json().catch(() => ({}));
      throw new Error(err.detail || 'Failed to submit registration');
    }
    return res.json();
  },

  async getRegistrations() {
    const res = await fetch(`${BASE_URL}/training/registrations`);
    if (!res.ok) throw new Error('Failed to fetch student registrations');
    return res.json();
  },

  // Portfolio
  async getPortfolio() {
    const res = await fetch(`${BASE_URL}/portfolio`);
    if (!res.ok) throw new Error('Failed to fetch portfolio projects');
    return res.json();
  },

  // AI Chatbot
  async sendChatMessage(message, sessionId = 'default-guest') {
    const res = await fetch(`${BASE_URL}/chat`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message, session_id: sessionId }),
    });
    if (!res.ok) {
      const err = await res.json().catch(() => ({}));
      throw new Error(err.detail || 'Failed to communicate with AI');
    }
    return res.json();
  },

  // Admin
  async getAdminStats() {
    const res = await fetch(`${BASE_URL}/admin/stats`);
    if (!res.ok) throw new Error('Failed to fetch admin stats');
    return res.json();
  },

  async updateContactStatus(id, status) {
    const res = await fetch(`${BASE_URL}/admin/contact/${id}/status`, {
      method: 'PATCH',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ status }),
    });
    return res.json();
  },

  async updateQuotationStatus(id, status) {
    const res = await fetch(`${BASE_URL}/admin/quotation/${id}/status`, {
      method: 'PATCH',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ status }),
    });
    return res.json();
  },

  async updateStudentStatus(id, status) {
    const res = await fetch(`${BASE_URL}/admin/student/${id}/status`, {
      method: 'PATCH',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ status }),
    });
    return res.json();
  },

  // Careers & Applications
  async getVacancies() {
    const res = await fetch(`${BASE_URL}/careers/vacancies`);
    if (!res.ok) throw new Error('Failed to fetch vacancies');
    return res.json();
  },

  async applyCareer(formData) {
    // formData is an instance of FormData with text fields and resume file
    const res = await fetch(`${BASE_URL}/careers/apply`, {
      method: 'POST',
      body: formData, // No Content-Type header so browser sets multipart boundary automatically
    });
    if (!res.ok) {
      const err = await res.json().catch(() => ({}));
      throw new Error(err.detail || err.message || `Server error (${res.status}). Please check your backend connection.`);
    }
    return res.json();
  },

  async getCareerApplications() {
    const res = await fetch(`${BASE_URL}/careers/applications`);
    if (!res.ok) throw new Error('Failed to fetch career applications');
    return res.json();
  },

  // Health
  async checkHealth() {
    const res = await fetch(`${BASE_URL}/health`);
    return res.json();
  }
};

