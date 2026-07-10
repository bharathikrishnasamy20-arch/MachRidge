import SectionTitle from '../common/SectionTitle'

export default function CompanyOverview() {
  return (
    <section className="section-padding">
      <div className="container">
        <div className="row align-items-center g-5">
          <div className="col-lg-6" data-aos="fade-right">
            <div style={{ borderRadius: 'var(--radius-lg)', overflow: 'hidden', boxShadow: 'var(--shadow-lg)' }}>
              <img
                src="/images/machine/turning-machine-operator.jpg"
                alt="Our Facility"
                className="w-100"
                style={{ display: 'block' }}
              />
            </div>
          </div>
          <div className="col-lg-6" data-aos="fade-left">
            <SectionTitle title="Company Overview" subtitle="" center={false} />
            <p style={{ fontSize: '1.05rem', lineHeight: 1.8, color: '#5a5a5a' }}>
              Founded in 2000, MachRidge Industries has grown from a small machine shop into a
              leading precision manufacturing facility serving clients across the globe. Our
              50,000 sq. ft. facility houses over 30 advanced CNC machines and a team of
              50+ skilled engineers and technicians.
            </p>
            <p style={{ fontSize: '1.05rem', lineHeight: 1.8, color: '#5a5a5a' }}>
              We specialize in high-precision components for aerospace, medical, automotive,
              and industrial applications. Our ISO 9001:2015 certified quality management
              system ensures every part meets the most demanding specifications.
            </p>
            <div className="row g-3 mt-4">
              <div className="col-sm-6">
                <div className="d-flex align-items-center gap-3 p-3 bg-light rounded-3">
                  <i className="bi bi-award text-primary" style={{ fontSize: '1.8rem' }}></i>
                  <div>
                    <h6 className="fw-bold mb-0">ISO Certified</h6>
                    <small className="text-muted">ISO 9001:2015</small>
                  </div>
                </div>
              </div>
              <div className="col-sm-6">
                <div className="d-flex align-items-center gap-3 p-3 bg-light rounded-3">
                  <i className="bi bi-geo-alt text-primary" style={{ fontSize: '1.8rem' }}></i>
                  <div>
                    <h6 className="fw-bold mb-0">Global Reach</h6>
                    <small className="text-muted">Serving 20+ countries</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
