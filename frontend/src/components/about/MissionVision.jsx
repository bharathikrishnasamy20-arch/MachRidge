export default function MissionVision() {
  return (
    <section className="section-padding" style={{ background: 'var(--light)' }}>
      <div className="container">
        <div className="row g-4">
          <div className="col-md-6" data-aos="fade-right">
            <div className="card border-0 h-100 p-5 text-center" style={{ borderRadius: 'var(--radius-lg)' }}>
              <div
                className="mx-auto mb-3 d-flex align-items-center justify-content-center"
                style={{ width: 80, height: 80, borderRadius: '50%', background: 'var(--gradient)', fontSize: '2rem', color: '#fff' }}
              >
                <i className="bi bi-bullseye"></i>
              </div>
              <h3 className="fw-bold mb-3">Our Mission</h3>
              <p className="text-muted mb-0" style={{ lineHeight: 1.8 }}>
                To deliver precision manufacturing excellence through continuous innovation,
                advanced technology, and unwavering commitment to quality, while building
                lasting partnerships with our clients.
              </p>
            </div>
          </div>
          <div className="col-md-6" data-aos="fade-left">
            <div className="card border-0 h-100 p-5 text-center" style={{ borderRadius: 'var(--radius-lg)' }}>
              <div
                className="mx-auto mb-3 d-flex align-items-center justify-content-center"
                style={{ width: 80, height: 80, borderRadius: '50%', background: 'var(--gradient)', fontSize: '2rem', color: '#fff' }}
              >
                <i className="bi bi-eye"></i>
              </div>
              <h3 className="fw-bold mb-3">Our Vision</h3>
              <p className="text-muted mb-0" style={{ lineHeight: 1.8 }}>
                To be the global benchmark for precision manufacturing — recognized for
                technological leadership, operational excellence, and setting the standard
                for quality in every component we produce.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
