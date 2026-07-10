import AnimatedCounter from '../common/AnimatedCounter'

const stats = [
  { end: 25, suffix: '+', label: 'Years of Precision' },
  { end: 5000, suffix: '+', label: 'Projects Delivered' },
  { end: 98, suffix: '%', label: 'Quality Rate' },
  { end: 50, suffix: '+', label: 'Expert Engineers' },
]

export default function CompanyIntro() {
  return (
    <section className="section-padding" style={{ background: 'var(--light)' }}>
      <div className="container">
        <div className="row align-items-center g-5">
          <div className="col-lg-6" data-aos="fade-right">
            <div style={{ borderRadius: 'var(--radius-lg)', overflow: 'hidden', boxShadow: 'var(--shadow-lg)' }}>
              <img
                src="/images/machine/engineers-workshop.jpg"
                alt="Manufacturing Facility"
                className="w-100"
                style={{ display: 'block' }}
              />
            </div>
          </div>
          <div className="col-lg-6" data-aos="fade-left">
            <h2 className="fw-bold mb-3">
              Welcome to <span style={{ color: 'var(--primary)' }}>MachRidge Industries</span>
            </h2>
            <p style={{ fontSize: '1.05rem', lineHeight: 1.8, color: '#5a5a5a' }}>
              With over two decades of experience in precision manufacturing, we deliver
              world-class CNC machining and fabrication solutions. Our state-of-the-art facility
              combines advanced technology with skilled craftsmanship to produce components
              that meet the most demanding specifications.
            </p>
            <p style={{ fontSize: '1.05rem', lineHeight: 1.8, color: '#5a5a5a' }}>
              From aerospace to automotive, medical to energy sectors, we serve diverse industries
              with unwavering commitment to quality, precision, and on-time delivery.
            </p>
          </div>
        </div>
        <div className="row g-4 mt-5">
          {stats.map((s, i) => (
            <div className="col-6 col-lg-3" key={i} data-aos="zoom-in" data-aos-delay={i * 100}>
              <div className="text-center p-4 bg-white rounded-3" style={{ boxShadow: 'var(--shadow-sm)' }}>
                <AnimatedCounter end={s.end} suffix={s.suffix} />
                <p className="mt-2 mb-0 fw-semibold" style={{ color: 'var(--secondary)', fontSize: '0.9rem' }}>
                  {s.label}
                </p>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
