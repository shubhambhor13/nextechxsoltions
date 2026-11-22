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

  // Admin Authentication
  async adminLogin(username, password) {
    const res = await fetch(`${BASE_URL}/admin_auth.php?action=login`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ username, password })
    });
    return res.json();
  },

  async adminCheckAuth() {
    try {
      const res = await fetch(`${BASE_URL}/admin_auth.php?action=check`);
      return await res.json();
    } catch {
      return { authenticated: false };
    }
  },

  async adminLogout() {
    try {
      const res = await fetch(`${BASE_URL}/admin_auth.php?action=logout`, { method: 'POST' });
      return await res.json();
    } catch {
      return { success: true };
    }
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
          message: `Thank you for your interest in NEXTECHX SOLUTIONS. Your application has been received successfully. For any queries, please contact our HR team at hr@nextechxsolutions.com. We appreciate your interest in joining our team!`,
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

  // Centralized CMS Foundation APIs
  async getCmsSettings() {
    try {
      const res = await fetch(`${BASE_URL}/cms/settings`);
      return await res.json();
    } catch {
      return { success: false, settings: {} };
    }
  },

  async saveCmsSettings(settings) {
    const res = await fetch(`${BASE_URL}/cms/save-settings`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ settings })
    });
    return res.json();
  },

  async getCmsAppearance() {
    try {
      const res = await fetch(`${BASE_URL}/cms/appearance`);
      return await res.json();
    } catch {
      return { success: false, appearance: {} };
    }
  },

  async getCmsNavigation() {
    try {
      const res = await fetch(`${BASE_URL}/cms/navigation`);
      return await res.json();
    } catch {
      return { success: false, navigation: [] };
    }
  },

  async getCmsPage(slug) {
    try {
      const res = await fetch(`${BASE_URL}/cms/page/${slug}`);
      return await res.json();
    } catch {
      return { success: false, page: null, sections: [] };
    }
  },

  async saveCmsSection(pageSlug, sectionKey, sectionData) {
    const res = await fetch(`${BASE_URL}/cms/save-section`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ page_slug: pageSlug, section_key: sectionKey, section_data: sectionData })
    });
    return res.json();
  },

  async getCmsMedia() {
    try {
      const res = await fetch(`${BASE_URL}/cms/media`);
      return await res.json();
    } catch {
      return { success: false, media: [] };
    }
  },

  // Health
  async checkHealth() {
    try {
      const res = await fetch(`${BASE_URL}/health`);
      return await res.json();
    } catch {
      return { status: 'offline' };
    }
  },

  // ==========================================
  // PART 2 ADVANCED CMS CLIENT METHODS
  // ==========================================

  // Services Management
  async getServices(activeOnly = false) {
    try {
      const res = await fetch(`${BASE_URL}/cms/services?active_only=${activeOnly ? '1' : '0'}`);
      return await res.json();
    } catch {
      return { success: false, services: [] };
    }
  },

  async saveService(slug, serviceData) {
    const res = await fetch(`${BASE_URL}/cms/save-service`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ slug, service: serviceData })
    });
    return res.json();
  },

  // Career Opportunities
  async getCareerOpportunities(activeOnly = false) {
    try {
      const res = await fetch(`${BASE_URL}/cms/careers-opportunities?active_only=${activeOnly ? '1' : '0'}`);
      return await res.json();
    } catch {
      return { success: false, opportunities: [] };
    }
  },

  async saveCareerOpportunity(data) {
    const res = await fetch(`${BASE_URL}/cms/save-career-opportunity`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ opportunity: data })
    });
    return res.json();
  },

  // Applications & Inquiries Management
  async updateApplicationStatus(id, status, internalNotes = '') {
    const res = await fetch(`${BASE_URL}/cms/update-application-status`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ id, status, internal_notes: internalNotes })
    });
    return res.json();
  },

  async updateInquiryStatus(type, id, status, internalNotes = '') {
    const res = await fetch(`${BASE_URL}/cms/update-inquiry-status`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ type, id, status, internal_notes: internalNotes })
    });
    return res.json();
  },

  // Forms Management
  async getForms() {
    try {
      const res = await fetch(`${BASE_URL}/cms/forms`);
      return await res.json();
    } catch {
      return { success: false, forms: [] };
    }
  },

  async saveForm(formKey, formData) {
    const res = await fetch(`${BASE_URL}/cms/save-form`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ form_key: formKey, form_data: formData })
    });
    return res.json();
  },

  // Email Templates
  async getEmailTemplates() {
    try {
      const res = await fetch(`${BASE_URL}/cms/email-templates`);
      return await res.json();
    } catch {
      return { success: false, templates: [] };
    }
  },

  async saveEmailTemplate(templateKey, templateData) {
    const res = await fetch(`${BASE_URL}/cms/save-email-template`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ template_key: templateKey, template_data: templateData })
    });
    return res.json();
  },

  // Testimonials & Reviews
  async getTestimonials(activeOnly = false) {
    try {
      const res = await fetch(`${BASE_URL}/cms/testimonials?active_only=${activeOnly ? '1' : '0'}`);
      return await res.json();
    } catch {
      return { success: false, testimonials: [] };
    }
  },

  async saveTestimonial(data) {
    const res = await fetch(`${BASE_URL}/cms/save-testimonial`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ testimonial: data })
    });
    return res.json();
  },

  // Blog & Articles
  async getArticles(publishedOnly = false) {
    try {
      const res = await fetch(`${BASE_URL}/cms/articles?published_only=${publishedOnly ? '1' : '0'}`);
      return await res.json();
    } catch {
      return { success: false, articles: [] };
    }
  },

  async saveArticle(data) {
    const res = await fetch(`${BASE_URL}/cms/save-article`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ article: data })
    });
    return res.json();
  },

  // SEO Management
  async getPageSeo(pageSlug) {
    try {
      const res = await fetch(`${BASE_URL}/cms/page-seo/${pageSlug}`);
      return await res.json();
    } catch {
      return { success: false, seo: null };
    }
  },

  async savePageSeo(pageSlug, seoData) {
    const res = await fetch(`${BASE_URL}/cms/save-page-seo`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ page_slug: pageSlug, seo: seoData })
    });
    return res.json();
  },

  // AI Chatbot Configuration
  async getChatbotConfig() {
    try {
      const res = await fetch(`${BASE_URL}/cms/chatbot-config`);
      return await res.json();
    } catch {
      return { success: false, config: {} };
    }
  },

  async saveChatbotConfig(config) {
    const res = await fetch(`${BASE_URL}/cms/save-chatbot-config`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ config })
    });
    return res.json();
  },

  // Global Website Controls
  async getGlobalControls() {
    try {
      const res = await fetch(`${BASE_URL}/cms/global-controls`);
      return await res.json();
    } catch {
      return { success: false, controls: {} };
    }
  },

  async saveGlobalControls(controls) {
    const res = await fetch(`${BASE_URL}/cms/save-global-controls`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ controls })
    });
    return res.json();
  },

  // Admin Users & Activity Logs
  async getAdminUsers() {
    try {
      const res = await fetch(`${BASE_URL}/cms/admin-users`);
      return await res.json();
    } catch {
      return { success: false, users: [] };
    }
  },

  async saveAdminUser(userData) {
    const res = await fetch(`${BASE_URL}/cms/save-admin-user`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ user: userData })
    });
    return res.json();
  },

  async getActivityLogs(limit = 100) {
    try {
      const res = await fetch(`${BASE_URL}/cms/activity-logs?limit=${limit}`);
      return await res.json();
    } catch {
      return { success: false, logs: [] };
    }
  }
};
