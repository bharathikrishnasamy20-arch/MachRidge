import SectionTitle from '../common/SectionTitle'

const values = [
  { icon: 'bi-check-circle', title: 'Quality First', desc: 'Every component meets stringent quality standards through rigorous inspection and testing protocols.' },
  { icon: 'bi-lightbulb', title: 'Innovation', desc: 'Continuous investment in cutting-edge technology and process improvement to stay ahead.' },
  { icon: 'bi-handshake', title: 'Integrity', desc: 'Transparent communication, ethical practices, and accountability in everything we do.' },
  { icon: 'bi-people', title: 'Teamwork', desc: 'Collaborative approach combining expertise across engineering, production, and support teams.' },
  { icon: 'bi-clock', title: 'Reliability', desc: 'Consistent on-time delivery and dependable performance you can count on.' },
  { icon: 'bi-globe', title: 'Sustainability', desc: 'Environmentally responsible manufacturing with waste reduction and energy efficiency.' },
]

export default function CoreValues() {
  return (
    <section className="section-padding">
      <div className="container">
        <SectionTitle title="Our Core Values" subtitle="The principles that guide every project we undertake" />
        <div className="row g-4">
          {values.map((v, i) => (
            <div className="col-md-6 col-lg-4" key={i} data-aos="fade-up" data-aos-delay={i * 80}>
              <div
                className="card h-100 p-4 border-0"
                style={{ cursor: 'default', borderRadius: 'var(--radius-lg)' }}
                onMouseEnter={(e) => { e.currentTarget.style.transform = 'translateY(-8px)'; e.currentTarget.style.boxShadow = '0 15px 40px rgba(26,82,118,0.12)' }}
                onMouseLeave={(e) => { e.currentTarget.style.transform = 'translateY(0)'; e.currentTarget.style.boxShadow = 'var(--shadow-sm)' }}
              >
                <div className="d-flex align-items-center gap-3 mb-3">
                  <div
                    className="d-flex align-items-center justify-content-center flex-shrink-0"
                    style={{ width: 55, height: 55, borderRadius: '50%', background: 'var(--gradient)', fontSize: '1.4rem', color: '#fff' }}
                  >
                    <i className={`bi ${v.icon}`}></i>
                  </div>
                  <h5 className="fw-bold mb-0">{v.title}</h5>
                </div>
                <p className="card-text small text-muted mb-0">{v.desc}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
