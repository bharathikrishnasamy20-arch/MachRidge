import SectionTitle from '../common/SectionTitle'

const steps = [
  { icon: 'bi-chat-dots', title: 'Inquiry', desc: 'Submit your requirements and specifications' },
  { icon: 'bi-pencil-square', title: 'Engineering Review', desc: 'Our team analyzes and optimizes the design' },
  { icon: 'bi-tools', title: 'Machining', desc: 'Precision CNC machining of components' },
  { icon: 'bi-clipboard2-check', title: 'Inspection', desc: 'Rigorous quality control and measurement' },
  { icon: 'bi-box-seam', title: 'Packaging', desc: 'Secure packaging for safe transport' },
  { icon: 'bi-truck', title: 'Delivery', desc: 'On-time delivery to your location' },
]

export default function ManufacturingProcess() {
  return (
    <section className="section-padding process-section" style={{ background: 'var(--light)' }}>
      <div className="container">
        <SectionTitle title="Our Manufacturing Process" subtitle="From concept to delivery — precision at every step" />
        <div className="process-steps">
          {steps.map((s, i) => (
            <div className="process-step" key={i} data-aos="fade-up" data-aos-delay={i * 100}>
              <div className="process-step-connector">
                <div className="process-step-line" />
              </div>
              <div className="process-step-card">
                <div className="process-step-number">{String(i + 1).padStart(2, '0')}</div>
                <div className="process-step-icon">
                  <i className={`bi ${s.icon}`}></i>
                </div>
                <h5 className="process-step-title">{s.title}</h5>
                <p className="process-step-desc">{s.desc}</p>
              </div>
              {i < steps.length - 1 && <div className="process-step-arrow"><i className="bi bi-chevron-down"></i></div>}
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
