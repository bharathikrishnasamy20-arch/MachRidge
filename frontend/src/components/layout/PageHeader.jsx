import { Link } from 'react-router-dom'

export default function PageHeader({ title, subtitle, breadcrumbs = [] }) {
  return (
    <section
      className="page-header"
      style={{
        background: 'var(--gradient)',
        padding: '140px 0 80px',
        position: 'relative',
        overflow: 'hidden',
      }}
    >
      <div
        style={{
          position: 'absolute',
          top: 0, left: 0, right: 0, bottom: 0,
          background: 'url(/images/machine/lathe-steel-processing.jpg) center/cover',
          opacity: 0.1,
        }}
      />
      <div className="container position-relative" data-aos="fade-up">
        <h1 className="text-white fw-bold mb-3">{title}</h1>
        {subtitle && <p className="text-white-50 mb-0" style={{ maxWidth: 600, fontSize: '1.1rem' }}>{subtitle}</p>}
        {breadcrumbs.length > 0 && (
          <nav className="mt-3">
            <ol className="breadcrumb mb-0">
              <li className="breadcrumb-item">
                <Link to="/" className="text-white-50 text-decoration-none">Home</Link>
              </li>
              {breadcrumbs.map((b, i) => (
                <li key={i} className={`breadcrumb-item ${i === breadcrumbs.length - 1 ? 'active text-white' : ''}`}>
                  {b.link ? <Link to={b.link} className="text-white-50 text-decoration-none">{b.label}</Link> : b.label}
                </li>
              ))}
            </ol>
          </nav>
        )}
      </div>
    </section>
  )
}
