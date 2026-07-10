import { useState, useEffect } from 'react'
import { Link, NavLink } from 'react-router-dom'

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false)
  const [open, setOpen] = useState(false)

  useEffect(() => {
    const onScroll = () => setScrolled(window.scrollY > 50)
    window.addEventListener('scroll', onScroll)
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  const links = [
    { to: '/', label: 'Home' },
    { to: '/about', label: 'About Us' },
    { to: '/products', label: 'Products' },
    { to: '/capabilities', label: 'Capabilities' },
    { to: '/contact', label: 'Contact' },
  ]

  return (
    <nav className={`navbar navbar-expand-lg navbar-main fixed-top ${scrolled ? 'navbar-scrolled' : 'navbar-transparent'}`}>
      <div className="container">
        <Link className="navbar-brand" to="/" onClick={() => setOpen(false)}>
          Mach<span>Ridge</span>
        </Link>
        <button
          className="navbar-toggler"
          onClick={() => setOpen(!open)}
          aria-label="Toggle navigation"
        >
          <div className={`hamburger ${open ? 'open' : ''}`}>
            <span></span><span></span><span></span>
          </div>
        </button>
        <div className={`collapse navbar-collapse ${open ? 'show' : ''}`}>
          <ul className="navbar-nav ms-auto align-items-lg-center">
            {links.map((l) => (
              <li className="nav-item" key={l.to}>
                <NavLink
                  className={({ isActive }) => `nav-link ${isActive ? 'active' : ''}`}
                  to={l.to}
                  onClick={() => setOpen(false)}
                  end={l.to === '/'}
                >
                  {l.label}
                </NavLink>
              </li>
            ))}
            <li className="nav-item ms-lg-3">
              <Link className="nav-link quote-btn" to="/contact" onClick={() => setOpen(false)}>
                Request Quote
              </Link>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  )
}
