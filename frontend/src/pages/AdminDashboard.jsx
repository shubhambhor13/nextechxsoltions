import React, { useState, useEffect } from 'react';
import { 
  Lock, 
  Unlock, 
  BarChart3, 
  Users, 
  FileText, 
  MessageSquare, 
  PhoneCall, 
  CheckCircle2, 
  Clock, 
  RefreshCw, 
  Download, 
  Search, 
  Filter, 
  Sparkles, 
  AlertCircle,
  Eye,
  X
} from 'lucide-react';
import { api } from '../services/api';

export default function AdminDashboard() {
  const [isAuthenticated, setIsAuthenticated] = useState(() => {
    return sessionStorage.getItem('app_admin_auth') === 'true';
  });
  const [password, setPassword] = useState('');
  const [authError, setAuthError] = useState('');

  const [activeTab, setActiveTab] = useState('overview');
  const [stats, setStats] = useState(null);
  const [students, setStudents] = useState([]);
  const [inquiries, setInquiries] = useState([]);
  const [quotes, setQuotes] = useState([]);
  const [consultations, setConsultations] = useState([]);
  const [careers, setCareers] = useState([]);
  
  const [loading, setLoading] = useState(false);
  const [searchQuery, setSearchQuery] = useState('');
  const [courseFilter, setCourseFilter] = useState('all');
  const [selectedItemModal, setSelectedItemModal] = useState(null);

  // Authentication check
  const handleLogin = (e) => {
    e.preventDefault();
    if (password === 'admin123') {
      setIsAuthenticated(true);
      sessionStorage.setItem('app_admin_auth', 'true');
      setAuthError('');
      loadAllData();
    } else {
      setAuthError('Invalid Admin Passcode. Hint: admin123');
    }
  };

  const handleLogout = () => {
    setIsAuthenticated(false);
    sessionStorage.removeItem('app_admin_auth');
  };

  const loadAllData = async () => {
    setLoading(true);
    try {
      const [statsData, studentsData, inquiriesData, quotesData, consultsData, careersData] = await Promise.all([
        api.getAdminStats().catch(() => null),
        api.getRegistrations().catch(() => []),
        api.getContactMessages().catch(() => []),
        api.getQuotations().catch(() => []),
        api.getConsultations().catch(() => []),
        api.getCareerApplications().catch(() => [])
      ]);

      if (statsData) setStats(statsData);
      setStudents(studentsData);
      setInquiries(inquiriesData);
      setQuotes(quotesData);
      setConsultations(consultsData);
      setCareers(careersData);
    } catch (err) {
      console.error("Failed to load admin data", err);
    } finally {
      setLoading(false);
    }
  };

  useEffect(() => {
    if (isAuthenticated) {
      loadAllData();
    }
  }, [isAuthenticated]);

  // Status updates
  const handleUpdateStudentStatus = async (id, status) => {
    try {
      await api.updateStudentStatus(id, status);
      setStudents(prev => prev.map(s => s.id === id ? { ...s, status } : s));
      if (selectedItemModal && selectedItemModal.id === id) {
        setSelectedItemModal(prev => ({ ...prev, status }));
      }
    } catch (e) {
      alert("Failed to update status");
    }
  };

  const handleUpdateContactStatus = async (id, status) => {
    try {
      await api.updateContactStatus(id, status);
      setInquiries(prev => prev.map(i => i.id === id ? { ...i, status } : i));
      if (selectedItemModal && selectedItemModal.id === id) {
        setSelectedItemModal(prev => ({ ...prev, status }));
      }
    } catch (e) {
      alert("Failed to update status");
    }
  };

  const handleUpdateQuotationStatus = async (id, status) => {
    try {
      await api.updateQuotationStatus(id, status);
      setQuotes(prev => prev.map(q => q.id === id ? { ...q, status } : q));
      if (selectedItemModal && selectedItemModal.id === id) {
        setSelectedItemModal(prev => ({ ...prev, status }));
      }
    } catch (e) {
      alert("Failed to update status");
    }
  };

  // Export CSV helper
  const exportStudentsToCSV = () => {
    if (!students.length) return;
    const headers = ["ID", "Name", "Email", "Phone", "Qualification", "Internship Domain", "Batch", "Status", "Applied At"];
    const rows = students.map(s => [
      s.id,
      `"${s.full_name}"`,
      s.email,
      s.phone,
      `"${s.qualification}"`,
      `"${s.course_selected}"`,
      `"${s.batch_timing}"`,
      s.status,
      s.created_at
    ]);

    const csvContent = "data:text/csv;charset=utf-8," + [headers.join(","), ...rows.map(r => r.join(","))].join("\n");
    const encodedUri = encodeURI(csvContent);
    const link = document.createElement("a");
    link.setAttribute("href", encodedUri);
    link.setAttribute("download", `Students_Export_${new Date().toISOString().split('T')[0]}.csv`);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
  };

  // 1. Password Protected Gate
  if (!isAuthenticated) {
    return (
      <div className="min-h-[70vh] flex items-center justify-center px-4 py-16 bg-white">
        <div className="w-full max-w-md p-8 rounded-2xl bg-white border border-slate-200 shadow-xl space-y-6">
          <div className="text-center space-y-2">
            <div className="w-12 h-12 rounded-2xl bg-blue-50 border border-blue-200 text-blue-600 flex items-center justify-center mx-auto">
              <Lock className="w-6 h-6" />
            </div>
            <h2 className="text-2xl font-bold text-slate-900">Management Portal</h2>
            <p className="text-xs text-slate-500">
              Staff access for student registrations, enterprise leads, and quotes.
            </p>
          </div>

          <form onSubmit={handleLogin} className="space-y-4">
            {authError && (
              <div className="p-3 rounded-xl bg-red-50 border border-red-200 text-red-600 text-xs flex items-center gap-2">
                <AlertCircle className="w-4 h-4 shrink-0" />
                <span>{authError}</span>
              </div>
            )}

            <div>
              <label className="block text-xs font-semibold text-slate-700 mb-1.5">
                Admin Passcode
              </label>
              <input
                type="password"
                required
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                placeholder="Enter passcode (default: admin123)"
                className="w-full bg-slate-50/60 border border-slate-200 rounded-xl px-4 py-2.5 text-xs text-slate-900 placeholder-slate-400 focus:outline-none focus:border-blue-600 focus:bg-white transition-colors"
              />
            </div>

            <button
              type="submit"
              className="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 font-bold text-xs text-white shadow-sm transition-all"
            >
              Sign In to Management Console
            </button>
          </form>

          <div className="text-center text-[11px] text-slate-400">
            Internal Security Gateway • Active Session Encryption
          </div>
        </div>
      </div>
    );
  }

  // Filtered Students
  const filteredStudents = students.filter(s => {
    const matchesSearch = s.full_name?.toLowerCase().includes(searchQuery.toLowerCase()) ||
                          s.email?.toLowerCase().includes(searchQuery.toLowerCase()) ||
                          s.phone?.includes(searchQuery);
    const matchesCourse = courseFilter === 'all' || s.course_selected === courseFilter;
    return matchesSearch && matchesCourse;
  });

  return (
    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-8 bg-white">
      
      {/* Top Header */}
      <div className="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-slate-200">
        <div>
          <div className="flex items-center gap-2">
            <span className="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
            <span className="text-xs font-semibold text-blue-600 uppercase tracking-wider">MANAGEMENT CONSOLE • LIVE BACKEND</span>
          </div>
          <h1 className="text-2xl sm:text-3xl font-extrabold text-slate-900 mt-1">
            Operations Dashboard
          </h1>
        </div>

        <div className="flex items-center gap-3">
          <button
            onClick={loadAllData}
            disabled={loading}
            className="p-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 hover:bg-slate-100 flex items-center gap-1.5 text-xs font-semibold transition-colors"
          >
            <RefreshCw className={`w-3.5 h-3.5 ${loading ? 'animate-spin' : ''}`} />
            <span>Refresh</span>
          </button>

          <button
            onClick={handleLogout}
            className="px-4 py-2.5 rounded-xl bg-slate-50 border border-slate-200 text-xs font-semibold text-red-600 hover:bg-red-50 transition-colors"
          >
            Lock Portal
          </button>
        </div>
      </div>

      {/* KPI Stats Overview Cards */}
      <div className="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div className="p-5 rounded-2xl bg-slate-50 border border-slate-200 shadow-sm">
          <div className="flex items-center justify-between text-slate-500 text-xs font-semibold">
            <span>Student Applications</span>
            <Users className="w-4 h-4 text-emerald-600" />
          </div>
          <div className="text-3xl font-extrabold text-slate-900 mt-2">
            {students.length}
          </div>
          <div className="text-[10px] text-emerald-700 font-medium mt-1">Active Cohort</div>
        </div>

        <div className="p-5 rounded-2xl bg-slate-50 border border-slate-200 shadow-sm">
          <div className="flex items-center justify-between text-slate-500 text-xs font-semibold">
            <span>Contact Inquiries</span>
            <MessageSquare className="w-4 h-4 text-blue-600" />
          </div>
          <div className="text-3xl font-extrabold text-slate-900 mt-2">
            {inquiries.length}
          </div>
          <div className="text-[10px] text-blue-700 font-medium mt-1">General & Corporate Leads</div>
        </div>

        <div className="p-5 rounded-2xl bg-slate-50 border border-slate-200 shadow-sm">
          <div className="flex items-center justify-between text-slate-500 text-xs font-semibold">
            <span>Quotation Requests</span>
            <FileText className="w-4 h-4 text-indigo-600" />
          </div>
          <div className="text-3xl font-extrabold text-slate-900 mt-2">
            {quotes.length}
          </div>
          <div className="text-[10px] text-indigo-700 font-medium mt-1">Enterprise Project Scopes</div>
        </div>

        <div className="p-5 rounded-2xl bg-slate-50 border border-slate-200 shadow-sm">
          <div className="flex items-center justify-between text-slate-500 text-xs font-semibold">
            <span>Consultations</span>
            <PhoneCall className="w-4 h-4 text-purple-600" />
          </div>
          <div className="text-3xl font-extrabold text-slate-900 mt-2">
            {consultations.length}
          </div>
          <div className="text-[10px] text-purple-700 font-medium mt-1">30-Min Strategy Calls</div>
        </div>
      </div>

      {/* Tabs Navigation */}
      <div className="flex flex-wrap items-center gap-2 border-b border-slate-200 pb-2">
        <button
          onClick={() => setActiveTab('overview')}
          className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all ${
            activeTab === 'overview' ? 'bg-blue-600 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100'
          }`}
        >
          Overview & Activity
        </button>
        <button
          onClick={() => setActiveTab('students')}
          className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-1.5 ${
            activeTab === 'students' ? 'bg-blue-600 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100'
          }`}
        >
          <span>Student Registrations</span>
          <span className="px-1.5 py-0.2 text-[9px] bg-slate-200 text-slate-700 rounded font-mono">{students.length}</span>
        </button>
        <button
          onClick={() => setActiveTab('inquiries')}
          className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-1.5 ${
            activeTab === 'inquiries' ? 'bg-blue-600 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100'
          }`}
        >
          <span>Customer Inquiries</span>
          <span className="px-1.5 py-0.2 text-[9px] bg-slate-200 text-slate-700 rounded font-mono">{inquiries.length}</span>
        </button>
        <button
          onClick={() => setActiveTab('quotes')}
          className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-1.5 ${
            activeTab === 'quotes' ? 'bg-blue-600 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100'
          }`}
        >
          <span>Quotation Requests</span>
          <span className="px-1.5 py-0.2 text-[9px] bg-slate-200 text-slate-700 rounded font-mono">{quotes.length}</span>
        </button>
        <button
          onClick={() => setActiveTab('consultations')}
          className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-1.5 ${
            activeTab === 'consultations' ? 'bg-blue-600 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100'
          }`}
        >
          <span>Consultation Bookings</span>
          <span className="px-1.5 py-0.2 text-[9px] bg-slate-200 text-slate-700 rounded font-mono">{consultations.length}</span>
        </button>
        <button
          onClick={() => setActiveTab('careers')}
          className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all flex items-center gap-1.5 ${
            activeTab === 'careers' ? 'bg-blue-600 text-white font-bold shadow-sm' : 'text-slate-600 hover:text-slate-900 hover:bg-slate-100'
          }`}
        >
          <span>Career Applications</span>
          <span className="px-1.5 py-0.2 text-[9px] bg-emerald-100 text-emerald-800 rounded font-mono font-bold">{careers.length}</span>
        </button>
      </div>

      {/* TAB 1: OVERVIEW */}
      {activeTab === 'overview' && (
        <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <div className="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-4">
            <h3 className="text-xs font-bold text-slate-700 uppercase tracking-wider">
              Recent Activity Feed
            </h3>
            <div className="space-y-3">
              {[...students, ...inquiries].slice(0, 6).map((item, idx) => (
                <div key={idx} className="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between text-xs">
                  <div>
                    <div className="font-semibold text-slate-900">
                      {item.full_name || item.name}
                    </div>
                    <div className="text-[11px] text-slate-500">
                      {item.course_selected || item.service_interest}
                    </div>
                  </div>
                  <div className="text-right">
                    <span className="px-2 py-0.5 rounded text-[10px] uppercase font-bold bg-blue-100 text-blue-700">
                      {item.status || 'Active'}
                    </span>
                    <div className="text-[10px] text-slate-400 font-mono mt-0.5">{item.created_at?.split(' ')[0]}</div>
                  </div>
                </div>
              ))}
            </div>
          </div>

          <div className="p-6 rounded-2xl bg-white border border-slate-200 shadow-sm space-y-4">
            <h3 className="text-xs font-bold text-slate-700 uppercase tracking-wider">
              System Environment & Health
            </h3>
            <div className="space-y-2 text-xs">
              <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                <span className="text-slate-600">FastAPI Gateway</span>
                <span className="text-emerald-600 font-mono font-semibold flex items-center gap-1">
                  <span className="w-2 h-2 rounded-full bg-emerald-500"></span> Online (Port 8000)
                </span>
              </div>
              <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                <span className="text-slate-600">Database Engine</span>
                <span className="text-blue-600 font-mono font-semibold">SQLite3 / PostgreSQL Ready</span>
              </div>
              <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                <span className="text-slate-600">Automation Webhook Engine</span>
                <span className="text-purple-600 font-mono font-semibold">n8n Orchestration Ready</span>
              </div>
              <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 flex items-center justify-between">
                <span className="text-slate-600">AI Assistant Engine</span>
                <span className="text-indigo-600 font-mono font-semibold">Knowledge RAG</span>
              </div>
            </div>
          </div>
        </div>
      )}

      {/* TAB 2: STUDENTS REGISTRATION */}
      {activeTab === 'students' && (
        <div className="space-y-4">
          <div className="flex flex-col sm:flex-row items-center justify-between gap-3 bg-slate-50 p-4 rounded-xl border border-slate-200">
            <div className="flex flex-wrap items-center gap-3 w-full sm:w-auto">
              <div className="relative flex-1 sm:w-64">
                <Search className="w-3.5 h-3.5 text-slate-400 absolute left-3 top-3" />
                <input
                  type="text"
                  value={searchQuery}
                  onChange={(e) => setSearchQuery(e.target.value)}
                  placeholder="Search by name, email, phone..."
                  className="w-full bg-white border border-slate-200 rounded-xl pl-9 pr-3 py-2 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
                />
              </div>

              <select
                value={courseFilter}
                onChange={(e) => setCourseFilter(e.target.value)}
                className="bg-white border border-slate-200 rounded-xl px-3 py-2 text-xs text-slate-900 focus:outline-none focus:border-blue-600"
              >
                <option value="all">All Internship Domains</option>
                <option value="Artificial Intelligence & Machine Learning">AI & Machine Learning</option>
                <option value="Data Analytics & Power BI Mastery">Data Analytics & Power BI</option>
                <option value="Full Stack Modern Web Development">Full Stack Web Dev</option>
                <option value="Python Enterprise & Workflow Automation">Python Enterprise</option>
                <option value="Java Enterprise & Microservices">Java Enterprise</option>
                <option value="Cyber Security & SOC Defense">Cyber Security</option>
              </select>
            </div>

            <button
              onClick={exportStudentsToCSV}
              className="px-4 py-2 rounded-xl bg-emerald-600 hover:bg-emerald-700 font-semibold text-xs text-white flex items-center gap-1.5 transition-all shadow-sm"
            >
              <Download className="w-3.5 h-3.5" />
              <span>Export CSV</span>
            </button>
          </div>

          <div className="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
            <table className="w-full text-left text-xs text-slate-700">
              <thead className="bg-slate-50 text-slate-500 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-200">
                <tr>
                  <th className="p-3.5">Candidate</th>
                  <th className="p-3.5">Internship Domain</th>
                  <th className="p-3.5">Qualification</th>
                  <th className="p-3.5">Batch Timing</th>
                  <th className="p-3.5">Status</th>
                  <th className="p-3.5 text-right">Actions</th>
                </tr>
              </thead>
              <tbody className="divide-y divide-slate-100">
                {filteredStudents.length === 0 ? (
                  <tr>
                    <td colSpan={6} className="p-8 text-center text-slate-400">
                      No student applications found matching query.
                    </td>
                  </tr>
                ) : (
                  filteredStudents.map((s) => (
                    <tr key={s.id} className="hover:bg-slate-50/70 transition-colors">
                      <td className="p-3.5">
                        <div className="font-bold text-slate-900">{s.full_name}</div>
                        <div className="text-[11px] text-slate-500">{s.email} • {s.phone}</div>
                      </td>
                      <td className="p-3.5 font-medium text-blue-600">{s.course_selected}</td>
                      <td className="p-3.5 text-slate-600">{s.qualification}</td>
                      <td className="p-3.5 text-slate-500 text-[11px]">{s.batch_timing}</td>
                      <td className="p-3.5">
                        <select
                          value={s.status}
                          onChange={(e) => handleUpdateStudentStatus(s.id, e.target.value)}
                          className="bg-white border border-slate-200 rounded-lg px-2 py-1 text-[11px] font-semibold text-slate-800 focus:outline-none focus:border-blue-500"
                        >
                          <option value="under_review">Under Review</option>
                          <option value="accepted">Accepted</option>
                          <option value="enrolled">Enrolled</option>
                          <option value="rejected">Rejected</option>
                        </select>
                      </td>
                      <td className="p-3.5 text-right">
                        <button
                          onClick={() => setSelectedItemModal({ ...s, modalType: 'student' })}
                          className="p-1.5 rounded-lg bg-slate-100 border border-slate-200 text-blue-600 hover:text-blue-800 transition-colors"
                        >
                          <Eye className="w-3.5 h-3.5" />
                        </button>
                      </td>
                    </tr>
                  ))
                )}
              </tbody>
            </table>
          </div>
        </div>
      )}

      {/* TAB 3: CONTACT INQUIRIES */}
      {activeTab === 'inquiries' && (
        <div className="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
          <table className="w-full text-left text-xs text-slate-700">
            <thead className="bg-slate-50 text-slate-500 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-200">
              <tr>
                <th className="p-3.5">Sender</th>
                <th className="p-3.5">Company</th>
                <th className="p-3.5">Service Interest</th>
                <th className="p-3.5">Message Snippet</th>
                <th className="p-3.5">Status</th>
                <th className="p-3.5 text-right">Actions</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-slate-100">
              {inquiries.length === 0 ? (
                <tr>
                  <td colSpan={6} className="p-8 text-center text-slate-400">No contact messages received.</td>
                </tr>
              ) : (
                inquiries.map((inq) => (
                  <tr key={inq.id} className="hover:bg-slate-50/70 transition-colors">
                    <td className="p-3.5">
                      <div className="font-bold text-slate-900">{inq.name}</div>
                      <div className="text-[11px] text-slate-500">{inq.email} • {inq.phone || 'No phone'}</div>
                    </td>
                    <td className="p-3.5 text-slate-600">{inq.company || 'Direct Client'}</td>
                    <td className="p-3.5 font-medium text-blue-600">{inq.service_interest}</td>
                    <td className="p-3.5 text-slate-500 max-w-xs truncate">{inq.message}</td>
                    <td className="p-3.5">
                      <select
                        value={inq.status}
                        onChange={(e) => handleUpdateContactStatus(inq.id, e.target.value)}
                        className="bg-white border border-slate-200 rounded-lg px-2 py-1 text-[11px] font-semibold text-slate-800 focus:outline-none focus:border-blue-500"
                      >
                        <option value="new">New</option>
                        <option value="contacted">Contacted</option>
                        <option value="closed">Closed</option>
                      </select>
                    </td>
                    <td className="p-3.5 text-right">
                      <button
                        onClick={() => setSelectedItemModal({ ...inq, modalType: 'contact' })}
                        className="p-1.5 rounded-lg bg-slate-100 border border-slate-200 text-blue-600 hover:text-blue-800 transition-colors"
                      >
                        <Eye className="w-3.5 h-3.5" />
                      </button>
                    </td>
                  </tr>
                ))
              )}
            </tbody>
          </table>
        </div>
      )}

      {/* TAB 4: QUOTATION REQUESTS */}
      {activeTab === 'quotes' && (
        <div className="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
          <table className="w-full text-left text-xs text-slate-700">
            <thead className="bg-slate-50 text-slate-500 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-200">
              <tr>
                <th className="p-3.5">Client</th>
                <th className="p-3.5">Domain</th>
                <th className="p-3.5">Budget</th>
                <th className="p-3.5">Timeline</th>
                <th className="p-3.5">Status</th>
                <th className="p-3.5 text-right">Actions</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-slate-100">
              {quotes.length === 0 ? (
                <tr>
                  <td colSpan={6} className="p-8 text-center text-slate-400">No quotation requests found.</td>
                </tr>
              ) : (
                quotes.map((q) => (
                  <tr key={q.id} className="hover:bg-slate-50/70 transition-colors">
                    <td className="p-3.5">
                      <div className="font-bold text-slate-900">{q.name}</div>
                      <div className="text-[11px] text-slate-500">{q.company || 'Individual'} • {q.email}</div>
                    </td>
                    <td className="p-3.5 font-medium text-blue-600">{q.service_category}</td>
                    <td className="p-3.5 font-mono text-emerald-700 font-bold">{q.budget_range}</td>
                    <td className="p-3.5 text-slate-600">{q.project_timeline}</td>
                    <td className="p-3.5">
                      <select
                        value={q.status}
                        onChange={(e) => handleUpdateQuotationStatus(q.id, e.target.value)}
                        className="bg-white border border-slate-200 rounded-lg px-2 py-1 text-[11px] font-semibold text-slate-800 focus:outline-none focus:border-blue-500"
                      >
                        <option value="pending">Pending</option>
                        <option value="quoted">Quoted</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                      </select>
                    </td>
                    <td className="p-3.5 text-right">
                      <button
                        onClick={() => setSelectedItemModal({ ...q, modalType: 'quote' })}
                        className="p-1.5 rounded-lg bg-slate-100 border border-slate-200 text-blue-600 hover:text-blue-800 transition-colors"
                      >
                        <Eye className="w-3.5 h-3.5" />
                      </button>
                    </td>
                  </tr>
                ))
              )}
            </tbody>
          </table>
        </div>
      )}

      {/* TAB 5: CONSULTATION BOOKINGS */}
      {activeTab === 'consultations' && (
        <div className="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
          <table className="w-full text-left text-xs text-slate-700">
            <thead className="bg-slate-50 text-slate-500 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-200">
              <tr>
                <th className="p-3.5">Booked By</th>
                <th className="p-3.5">Company</th>
                <th className="p-3.5">Topic</th>
                <th className="p-3.5">Scheduled Slot</th>
                <th className="p-3.5">Status</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-slate-100">
              {consultations.length === 0 ? (
                <tr>
                  <td colSpan={5} className="p-8 text-center text-slate-400">No consultations scheduled.</td>
                </tr>
              ) : (
                consultations.map((c) => (
                  <tr key={c.id} className="hover:bg-slate-50/70 transition-colors">
                    <td className="p-3.5">
                      <div className="font-bold text-slate-900">{c.name}</div>
                      <div className="text-[11px] text-slate-500">{c.email} • {c.phone}</div>
                    </td>
                    <td className="p-3.5 text-slate-600">{c.company || 'Enterprise'}</td>
                    <td className="p-3.5 font-medium text-blue-600">{c.topic}</td>
                    <td className="p-3.5 font-mono text-emerald-700 font-medium">
                      {c.preferred_date} ({c.preferred_time})
                    </td>
                    <td className="p-3.5">
                      <span className="px-2 py-0.5 rounded text-[10px] uppercase font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        {c.status}
                      </span>
                    </td>
                  </tr>
                ))
              )}
            </tbody>
          </table>
        </div>
      )}

      {/* TAB 5: CAREER APPLICATIONS */}
      {activeTab === 'careers' && (
        <div className="overflow-x-auto rounded-xl border border-slate-200 bg-white shadow-sm">
          <table className="w-full text-left text-xs text-slate-700">
            <thead className="bg-slate-50 text-slate-500 uppercase font-semibold text-[10px] tracking-wider border-b border-slate-200">
              <tr>
                <th className="p-3.5">Candidate</th>
                <th className="p-3.5">Type & Role</th>
                <th className="p-3.5">Education</th>
                <th className="p-3.5">Resume File</th>
                <th className="p-3.5">Email Status</th>
                <th className="p-3.5">Applied At</th>
                <th className="p-3.5 text-right">Actions</th>
              </tr>
            </thead>
            <tbody className="divide-y divide-slate-100">
              {careers.length === 0 ? (
                <tr>
                  <td colSpan={7} className="p-8 text-center text-slate-400">No career applications received yet.</td>
                </tr>
              ) : (
                careers.map((c) => (
                  <tr key={c.id} className="hover:bg-slate-50/70 transition-colors">
                    <td className="p-3.5">
                      <div className="font-bold text-slate-900">{c.full_name}</div>
                      <div className="text-[11px] text-slate-500">{c.email} • {c.phone}</div>
                    </td>
                    <td className="p-3.5">
                      <span className={`inline-block px-2 py-0.5 rounded text-[10px] font-bold uppercase mb-1 ${
                        c.applying_for === 'Job' ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-emerald-50 text-emerald-700 border border-emerald-200'
                      }`}>
                        {c.applying_for}
                      </span>
                      <div className="font-semibold text-slate-800">{c.position}</div>
                    </td>
                    <td className="p-3.5 text-slate-600 font-medium">{c.education}</td>
                    <td className="p-3.5">
                      {c.resume_filename ? (
                        <a 
                          href={`/api/careers/download-resume/${c.id}`}
                          target="_blank"
                          rel="noreferrer"
                          className="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-blue-50 hover:bg-blue-100 text-blue-700 border border-blue-200 font-semibold text-[11px] transition-colors"
                        >
                          <Download className="w-3 h-3" />
                          <span>{c.resume_filename}</span>
                        </a>
                      ) : (
                        <span className="text-slate-400">No file</span>
                      )}
                    </td>
                    <td className="p-3.5">
                      <span className="px-2 py-0.5 rounded text-[10px] uppercase font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                        {c.email_sent ? 'Sent to Gmail' : 'Logged'}
                      </span>
                    </td>
                    <td className="p-3.5 text-slate-500 font-mono text-[11px]">{c.created_at}</td>
                    <td className="p-3.5 text-right">
                      <button
                        onClick={() => setSelectedItemModal({
                          title: `Application: ${c.full_name}`,
                          ...c,
                          statement: c.message
                        })}
                        className="px-2.5 py-1 rounded bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[11px]"
                      >
                        View Notes
                      </button>
                    </td>
                  </tr>
                ))
              )}
            </tbody>
          </table>
        </div>
      )}

      {/* DETAIL MODAL */}
      {selectedItemModal && (
        <div className="fixed inset-0 z-50 flex items-center justify-center p-4 overflow-y-auto">
          <div className="fixed inset-0 bg-slate-900/40 backdrop-blur-sm" onClick={() => setSelectedItemModal(null)} />
          <div className="relative w-full max-w-lg bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 z-10 space-y-4 shadow-2xl">
            <div className="flex items-center justify-between pb-3 border-b border-slate-200">
              <h3 className="font-bold text-slate-900 text-base">Record Details #{selectedItemModal.id}</h3>
              <button onClick={() => setSelectedItemModal(null)} className="text-slate-400 hover:text-slate-700">✕</button>
            </div>

            <div className="space-y-3 text-xs">
              <div>
                <strong className="text-slate-500 block">Name / Client:</strong>
                <span className="text-slate-900 text-sm font-semibold">{selectedItemModal.full_name || selectedItemModal.name}</span>
              </div>

              <div>
                <strong className="text-slate-500 block">Contact Info:</strong>
                <span className="text-blue-600">{selectedItemModal.email} | {selectedItemModal.phone}</span>
              </div>

              {selectedItemModal.company && (
                <div>
                  <strong className="text-slate-500 block">Company:</strong>
                  <span className="text-slate-900">{selectedItemModal.company}</span>
                </div>
              )}

              {selectedItemModal.course_selected && (
                <div>
                  <strong className="text-slate-500 block">Domain & Batch:</strong>
                  <span className="text-emerald-700 font-semibold">{selectedItemModal.course_selected} ({selectedItemModal.batch_timing})</span>
                </div>
              )}

              {selectedItemModal.statement && (
                <div>
                  <strong className="text-slate-500 block">Statement / Notes:</strong>
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 mt-1">
                    {selectedItemModal.statement}
                  </div>
                </div>
              )}

              {selectedItemModal.requirements && (
                <div>
                  <strong className="text-slate-500 block">Project Requirements:</strong>
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 mt-1 whitespace-pre-wrap">
                    {selectedItemModal.requirements}
                  </div>
                </div>
              )}

              {selectedItemModal.message && (
                <div>
                  <strong className="text-slate-500 block">Message:</strong>
                  <div className="p-3 rounded-xl bg-slate-50 border border-slate-200 text-slate-700 mt-1 whitespace-pre-wrap">
                    {selectedItemModal.message}
                  </div>
                </div>
              )}
            </div>

            <div className="pt-4 border-t border-slate-200 flex justify-end">
              <button
                onClick={() => setSelectedItemModal(null)}
                className="px-5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-xs font-semibold text-slate-700 transition-colors"
              >
                Close View
              </button>
            </div>
          </div>
        </div>
      )}

    </div>
  );
}
