// API Service Client for NextTechX Solutions
const BASE_URL = import.meta.env.VITE_API_BASE_URL || '/api';

async function handleResponse(res, defaultError = 'Request failed') {
  if (!res.ok) {
    const err = await res.json().catch(() => ({}));
    const message = err.detail || err.message || err.error || `${defaultError} (${res.status})`;
    throw new Error(message);
  }
  return res.json();
}

export const api = {
  // Contact
  async submitContact(data) {
    try {
      const res = await fetch(`${BASE_URL}/contact`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
      });
      return await handleResponse(res, 'Failed to submit contact message');
    } catch (err) {
      if (import.meta.env.DEV && (err.name === 'TypeError' || err.message.includes('fetch') || err.message.includes('500'))) {
        console.warn('[DEV MODE] Backend offline. Simulated contact inquiry submission:', data);
        await new Promise(r => setTimeout(r, 600));
        return {
          status: 'success',
          success: true,
          message: 'Thank you! Your message has been routed to our team (contact@nextechxsolutions.com).'
        };
      }
      throw err;
    }
  },

  async getContactMessages() {
    const res = await fetch(`${BASE_URL}/contact`);
    if (!res.ok) throw new Error('Failed to fetch contact inquiries');
    return res.json();
  },

  // Quotation
  async submitQuotation(data) {
    try {
      const res = await fetch(`${BASE_URL}/quotation`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
      });
      return await handleResponse(res, 'Failed to submit quotation request');
    } catch (err) {
      if (import.meta.env.DEV && (err.name === 'TypeError' || err.message.includes('fetch') || err.message.includes('500'))) {
        console.warn('[DEV MODE] Backend offline. Simulated quotation submission:', data);
        await new Promise(r => setTimeout(r, 600));
        return {
          status: 'success',
          success: true,
          message: 'Your quotation request has been received! Our solutions team will review your requirements and provide a customized price estimate within 24 hours.'
        };
      }
      throw err;
    }
  },

  async getQuotations() {
    const res = await fetch(`${BASE_URL}/quotation`);
    if (!res.ok) throw new Error('Failed to fetch quotations');
    return res.json();
  },

  // Consultation
  async bookConsultation(data) {
    try {
      const res = await fetch(`${BASE_URL}/consultation`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
      });
      return await handleResponse(res, 'Failed to book consultation');
    } catch (err) {
      if (import.meta.env.DEV && (err.name === 'TypeError' || err.message.includes('fetch') || err.message.includes('500'))) {
        console.warn('[DEV MODE] Backend offline. Simulated consultation booking:', data);
        await new Promise(r => setTimeout(r, 600));
        return {
          status: 'success',
          success: true,
          message: 'Your strategy consultation has been reserved! Our Solutions Architect will send meeting credentials to your email and WhatsApp.'
        };
      }
      throw err;
    }
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
    try {
      const res = await fetch(`${BASE_URL}/training/register`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
      });
      return await handleResponse(res, 'Failed to submit registration');
    } catch (err) {
      if (import.meta.env.DEV && (err.name === 'TypeError' || err.message.includes('fetch') || err.message.includes('500'))) {
        console.warn('[DEV MODE] Backend offline. Simulated student registration:', data);
        await new Promise(r => setTimeout(r, 600));
        return {
          status: 'success',
          success: true,
          message: 'Application submitted successfully! Our HR desk (hr@nextechxsolutions.com) will review your profile.'
        };
      }
      throw err;
    }
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
  async sendChatMessage(message, sessionId = 'default-guest', history = []) {
    const res = await fetch(`${BASE_URL}/chat`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ message, session_id: sessionId, history }),
    });
    return handleResponse(res, 'Failed to communicate with AI');
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
    try {
      const res = await fetch(`${BASE_URL}/careers/vacancies`);
      if (!res.ok) throw new Error('Failed to fetch vacancies');
      return await res.json();
    } catch {
      return null;
    }
  },

  async applyCareer(formData) {
    try {
      // formData is an instance of FormData with text fields and resume file
      const res = await fetch(`${BASE_URL}/careers/apply`, {
        method: 'POST',
        body: formData, // Browser sets multipart boundary automatically
      });
      return await handleResponse(res, 'Failed to submit application');
    } catch (err) {
      if (import.meta.env.DEV && (err.name === 'TypeError' || err.message.includes('fetch') || err.message.includes('500') || err.message.includes('Failed'))) {
        console.warn('[DEV MODE] Backend offline. Simulating career application:', Object.fromEntries(formData.entries()));
        await new Promise(r => setTimeout(r, 800));
        return {
          success: true,
          message: `Application submitted successfully! Your application and resume have been forwarded to nextechxsolutions@gmail.com and our HR desk (hr@nextechxsolutions.com).`,
          simulated: true
        };
      }
      throw err;
    }
  },

  async getCareerApplications() {
    const res = await fetch(`${BASE_URL}/careers/applications`);
    if (!res.ok) throw new Error('Failed to fetch career applications');
    return res.json();
  },

  // Health
  async checkHealth() {
    try {
      const res = await fetch(`${BASE_URL}/health`);
      return await res.json();
    } catch {
      return { status: 'offline' };
    }
  }
};
