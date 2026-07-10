import SectionTitle from '../common/SectionTitle'

const reasons = [
  {
    icon: 'bi-gear-wide-connected',
    title: 'Precision Manufacturing',
    desc: 'Micron-level accuracy with advanced CNC machinery and rigorous quality control at every stage.',
  },
  {
    icon: 'bi-cpu',
    title: 'Advanced CNC Technology',
    desc: 'Multi-axis machining centers, CNC lathes, and grinding machines for complex geometries.',
  },
  {
    icon: 'bi-clipboard-check',
    title: 'Strict Quality Inspection',
    desc: 'ISO-compliant inspection using CMM, optical comparators, and precision measurement tools.',
  },
  {
    icon: 'bi-people',
    title: 'Customer Focused Solutions',
    desc: 'Dedicated engineering support from design review to final delivery with fast turnaround.',
  },
]

export default function WhyChooseUs() {
  return (
    <section className="section-padding">
      <div className="container">
        <SectionTitle title="Why Choose Us" subtitle="What sets us apart in precision manufacturing" />
        <div className="row g-4">
          {reasons.map((r, i) => (
            <div className="col-md-6 col-lg-3" key={i} data-aos="fade-up" data-aos-delay={i * 100}>
              <div
                className="card text-center h-100 p-4 border-0"
                style={{
                  cursor: 'default',
                  borderRadius: 'var(--radius-lg)',
                  transition: 'all 0.3s ease',
                }}
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-10px)'
                  e.currentTarget.style.boxShadow = '0 15px 50px rgba(26,82,118,0.15)'
                  e.currentTarget.style.borderColor = 'var(--primary)'
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)'
                  e.currentTarget.style.boxShadow = 'var(--shadow-sm)'
                  e.currentTarget.style.borderColor = 'transparent'
                }}
              >
                <div
                  className="mx-auto mb-3 d-flex align-items-center justify-content-center"
                  style={{
                    width: 70, height: 70, borderRadius: '50%',
                    background: 'var(--gradient)',
                    fontSize: '1.8rem', color: '#fff',
                  }}
                >
                  <i className={`bi ${r.icon}`}></i>
                </div>
                <h5 className="fw-bold mb-2">{r.title}</h5>
                <p className="card-text small text-muted mb-0">{r.desc}</p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
