import { useState } from 'react'
import SEO from '../seo/SEO'
import PageHeader from '../components/layout/PageHeader'
import { submitContact, submitQuoteRequest } from '../api/services'

export default function Contact() {
  const [form, setForm] = useState({ name: '', company: '', email: '', phone: '', message: '', is_quote: false })
  const [errors, setErrors] = useState({})
  const [submitting, setSubmitting] = useState(false)
  const [success, setSuccess] = useState(false)
  const [errorMsg, setErrorMsg] = useState('')

  const validate = () => {
    const errs = {}
    if (!form.name.trim()) errs.name = 'Name is required'
    if (!form.email.trim()) errs.email = 'Email is required'
    else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(form.email)) errs.email = 'Invalid email format'
    if (!form.message.trim()) errs.message = 'Message is required'
    setErrors(errs)
    return Object.keys(errs).length === 0
  }

  const handleChange = (e) => {
    const { name, value, type, checked } = e.target
    setForm((p) => ({ ...p, [name]: type === 'checkbox' ? checked : value }))
    if (errors[name]) setErrors((p) => ({ ...p, [name]: '' }))
  }

  const handleSubmit = async (e) => {
    e.preventDefault()
    if (!validate()) return
    setSubmitting(true)
    setErrorMsg('')
    try {
      if (form.is_quote) {
        await submitQuoteRequest(form)
      } else {
        await submitContact(form)
      }
      setSuccess(true)
      setForm({ name: '', company: '', email: '', phone: '', message: '', is_quote: false })
    } catch (err) {
      setErrorMsg(err.message || 'Something went wrong. Please try again.')
    } finally {
      setSubmitting(false)
    }
  }

  return (
    <>
      <SEO title="Contact Us" description="Get in touch with MachRidge Industries for quotes, inquiries, and support." />
      <PageHeader title="Contact Us" subtitle="Get in touch with our team" breadcrumbs={[{ label: 'Contact' }]} />
      <section className="section-padding">
        <div className="container">
          <div className="row g-5">
            <div className="col-lg-7">
              {success ? (
                <div className="text-center py-5">
                  <div className="mb-3" style={{ fontSize: '4rem', color: '#28a745' }}><i className="bi bi-check-circle-fill"></i></div>
                  <h4 className="fw-bold">Thank You!</h4>
                  <p className="text-muted">Your message has been sent successfully. We'll get back to you shortly.</p>
                  <button className="btn btn-primary mt-3" onClick={() => setSuccess(false)}>Send Another Message</button>
                </div>
              ) : (
                <form onSubmit={handleSubmit} noValidate>
                  <h4 className="fw-bold mb-4">{form.is_quote ? 'Request a Quote' : 'Send Us a Message'}</h4>
                  {errorMsg && <div className="alert alert-danger">{errorMsg}</div>}
                  <div className="row g-3">
                    <div className="col-md-6">
                      <input
                        type="text" name="name" placeholder="Your Name *"
                        className={`form-control ${errors.name ? 'is-invalid' : ''}`}
                        value={form.name} onChange={handleChange}
                      />
                      {errors.name && <div className="invalid-feedback">{errors.name}</div>}
                    </div>
                    <div className="col-md-6">
                      <input
                        type="text" name="company" placeholder="Company Name"
                        className="form-control" value={form.company} onChange={handleChange}
                      />
                    </div>
                    <div className="col-md-6">
                      <input
                        type="email" name="email" placeholder="Email Address *"
                        className={`form-control ${errors.email ? 'is-invalid' : ''}`}
                        value={form.email} onChange={handleChange}
                      />
                      {errors.email && <div className="invalid-feedback">{errors.email}</div>}
                    </div>
                    <div className="col-md-6">
                      <input
                        type="tel" name="phone" placeholder="Phone Number"
                        className="form-control" value={form.phone} onChange={handleChange}
                      />
                    </div>
                    <div className="col-12">
                      <textarea
                        name="message" rows="5" placeholder="Your Message *"
                        className={`form-control ${errors.message ? 'is-invalid' : ''}`}
                        value={form.message} onChange={handleChange}
                      ></textarea>
                      {errors.message && <div className="invalid-feedback">{errors.message}</div>}
                    </div>
                    <div className="col-12">
                      <div className="form-check">
                        <input
                          type="checkbox" className="form-check-input" id="is_quote"
                          name="is_quote" checked={form.is_quote} onChange={handleChange}
                        />
                        <label className="form-check-label small" htmlFor="is_quote">
                          This is a quote request
                        </label>
                      </div>
                    </div>
                    <div className="col-12">
                      <button type="submit" className="btn btn-primary px-5" disabled={submitting}>
                        {submitting ? <><span className="spinner-border spinner-border-sm me-2" />Sending...</> : 'Send Message'}
                      </button>
                    </div>
                  </div>
                </form>
              )}
            </div>
            <div className="col-lg-5">
              <div className="p-4 rounded-3" style={{ background: 'var(--light)' }}>
                <h5 className="fw-bold mb-4">Contact Information</h5>
                <div className="d-flex mb-3">
                  <div className="flex-shrink-0 me-3" style={{ color: 'var(--primary)', fontSize: '1.3rem' }}>
                    <i className="bi bi-geo-alt"></i>
                  </div>
                  <div>
                    <h6 className="fw-semibold mb-1">Address</h6>
                    <p className="small text-muted mb-0">123 Industrial Boulevard<br />Manufacturing City, ST 12345</p>
                  </div>
                </div>
                <div className="d-flex mb-3">
                  <div className="flex-shrink-0 me-3" style={{ color: 'var(--primary)', fontSize: '1.3rem' }}>
                    <i className="bi bi-telephone"></i>
                  </div>
                  <div>
                    <h6 className="fw-semibold mb-1">Phone</h6>
                    <p className="small text-muted mb-0">+1 (234) 567-8900</p>
                  </div>
                </div>
                <div className="d-flex mb-3">
                  <div className="flex-shrink-0 me-3" style={{ color: 'var(--primary)', fontSize: '1.3rem' }}>
                    <i className="bi bi-envelope"></i>
                  </div>
                  <div>
                    <h6 className="fw-semibold mb-1">Email</h6>
                    <p className="small text-muted mb-0">info@machridge.com</p>
                  </div>
                </div>
                <div className="d-flex mb-4">
                  <div className="flex-shrink-0 me-3" style={{ color: 'var(--primary)', fontSize: '1.3rem' }}>
                    <i className="bi bi-clock"></i>
                  </div>
                  <div>
                    <h6 className="fw-semibold mb-1">Working Hours</h6>
                    <p className="small text-muted mb-0">Monday - Friday: 8:00 AM - 6:00 PM</p>
                  </div>
                </div>
                <div className="d-flex gap-2">
                  <a href="https://wa.me/1234567890" target="_blank" rel="noopener noreferrer" className="btn btn-success btn-sm">
                    <i className="bi bi-whatsapp me-1"></i>WhatsApp
                  </a>
                  <a href="mailto:info@machridge.com" className="btn btn-primary btn-sm">
                    <i className="bi bi-envelope me-1"></i>Email Us
                  </a>
                </div>
                <hr className="my-4" />
                <div
                  className="rounded-3 overflow-hidden"
                  style={{ height: 220, background: '#e0e0e0', position: 'relative' }}
                >
                  <iframe
                    title="Location"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.1422937950147!2d-73.98731968459375!3d40.74844797932843!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a963!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1610000000000"
                    width="100%"
                    height="100%"
                    style={{ border: 0 }}
                    allowFullScreen=""
                    loading="lazy"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
