export default function TeamCard({ image, name, role, description }) {
  return (
    <div className="card text-center border-0 h-100" data-aos="fade-up" style={{ borderRadius: 'var(--radius-lg)' }}>
      <div style={{ padding: '30px 30px 0' }}>
        <div
          style={{
            width: 140, height: 140, borderRadius: '50%', overflow: 'hidden',
            margin: '0 auto', border: '3px solid var(--primary)',
          }}
        >
          <img src={image || 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&q=85'} alt={name} className="w-100 h-100" style={{ objectFit: 'cover' }} />
        </div>
      </div>
      <div className="card-body p-4">
        <h5 className="card-title mb-1">{name}</h5>
        <p className="text-primary small fw-semibold mb-2">{role}</p>
        <p className="card-text small text-muted">{description}</p>
      </div>
    </div>
  )
}
