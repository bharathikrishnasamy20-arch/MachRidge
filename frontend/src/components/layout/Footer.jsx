import { Link } from 'react-router-dom'
import { useState, useEffect } from 'react'
import { getSettings } from '../../api/services'

export default function Footer() {
  const [settings, setSettings] = useState(null)

  useEffect(() => {
    getSettings().then(setSettings).catch(() => {})
  }, [])

  return (
    <footer className="bg-dark text-white pt-5 pb-3">
      <div className="container">
        <div className="row g-4">
          <div className="col-lg-4">
            <h5 className="fw-bold mb-3">
              Mach<span style={{ color: 'var(--primary-light)' }}>Ridge</span>
            </h5>
            <p className="text-white-50 small" style={{ lineHeight: 1.8 }}>
              {settings?.company_description || 'Precision manufacturing and CNC machining solutions for industries worldwide.'}
            </p>
            <div className="d-flex gap-3 mt-3">
              <a href="#" className="text-white-50" style={{ fontSize: '1.2rem' }}><i className="bi bi-facebook"></i></a>
              <a href="#" className="text-white-50" style={{ fontSize: '1.2rem' }}><i className="bi bi-linkedin"></i></a>
              <a href="#" className="text-white-50" style={{ fontSize: '1.2rem' }}><i className="bi bi-twitter-x"></i></a>
              <a href="#" className="text-white-50" style={{ fontSize: '1.2rem' }}><i className="bi bi-instagram"></i></a>
            </div>
          </div>
          <div className="col-lg-2 col-md-4">
            <h6 className="fw-bold mb-3">Quick Links</h6>
            <ul className="list-unstyled small">
              <li className="mb-2"><Link to="/" className="text-white-50 text-decoration-none">Home</Link></li>
              <li className="mb-2"><Link to="/about" className="text-white-50 text-decoration-none">About</Link></li>
              <li className="mb-2"><Link to="/products" className="text-white-50 text-decoration-none">Products</Link></li>
              <li className="mb-2"><Link to="/capabilities" className="text-white-50 text-decoration-none">Capabilities</Link></li>
              <li className="mb-2"><Link to="/contact" className="text-white-50 text-decoration-none">Contact</Link></li>
            </ul>
          </div>
          <div className="col-lg-3 col-md-4">
            <h6 className="fw-bold mb-3">Services</h6>
            <ul className="list-unstyled small">
              <li className="mb-2"><span className="text-white-50">CNC Machining</span></li>
              <li className="mb-2"><span className="text-white-50">Precision Grinding</span></li>
              <li className="mb-2"><span className="text-white-50">Quality Inspection</span></li>
              <li className="mb-2"><span className="text-white-50">CAD/CAM Engineering</span></li>
              <li className="mb-2"><span className="text-white-50">Assembly Services</span></li>
            </ul>
          </div>
          <div className="col-lg-3 col-md-4">
            <h6 className="fw-bold mb-3">Contact Info</h6>
            <ul className="list-unstyled small text-white-50">
              <li className="mb-2"><i className="bi bi-geo-alt me-2"></i>{settings?.address || '123 Industrial Blvd, City'}</li>
              <li className="mb-2"><i className="bi bi-telephone me-2"></i>{settings?.phone || '+1 (234) 567-8900'}</li>
              <li className="mb-2"><i className="bi bi-envelope me-2"></i>{settings?.email || 'info@machridge.com'}</li>
              <li className="mb-2"><i className="bi bi-clock me-2"></i>Mon-Fri: 8AM - 6PM</li>
            </ul>
          </div>
        </div>
        <hr className="border-secondary my-4" />
        <div className="row">
          <div className="col text-center">
            <p className="small text-white-50 mb-0">
              &copy; {new Date().getFullYear()} MachRidge Industries. All rights reserved.
            </p>
          </div>
        </div>
      </div>
    </footer>
  )
}
