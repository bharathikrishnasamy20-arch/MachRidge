import { Link } from 'react-router-dom'

export default function CTASection() {
  return (
    <section
      className="section-padding text-center position-relative"
      style={{
        background: 'var(--gradient)',
        overflow: 'hidden',
      }}
    >
      <div
        style={{
          position: 'absolute', top: 0, left: 0, right: 0, bottom: 0,
          background: 'url(/images/machine/turning-machine-operator.jpg) center/cover',
          opacity: 0.08,
        }}
      />
      <div className="container position-relative" data-aos="fade-up">
        <h2 className="text-white fw-bold mb-3" style={{ fontSize: '2.2rem' }}>
          Need Precision Manufacturing Solutions?
        </h2>
        <p className="text-white-50 mb-4" style={{ maxWidth: 600, margin: '0 auto', fontSize: '1.1rem' }}>
          Get in touch with our engineering team for a free consultation and quote on your next project.
        </p>
        <div className="d-flex justify-content-center gap-3 flex-wrap">
          <Link to="/contact" className="btn btn-light fw-bold px-4" style={{ color: 'var(--primary)' }}>
            <i className="bi bi-chat-dots me-2"></i>Request Quote
          </Link>
          <Link to="/contact" className="btn btn-outline-light px-4">
            <i className="bi bi-envelope me-2"></i>Contact Us
          </Link>
        </div>
      </div>
    </section>
  )
}
