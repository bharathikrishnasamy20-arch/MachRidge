import { Link } from 'react-router-dom'

export default function ProductCard({ product }) {
  return (
    <div className="card h-100 border-0" data-aos="fade-up">
      <div style={{ height: 220, overflow: 'hidden', position: 'relative' }}>
        <img
          src={product.image || `/images/machine/lathe-operator.jpg`}
          alt={product.name || product.title}
          className="w-100 h-100"
          style={{ objectFit: 'cover', transition: 'transform 0.5s ease' }}
          onMouseEnter={(e) => e.currentTarget.style.transform = 'scale(1.1)'}
          onMouseLeave={(e) => e.currentTarget.style.transform = 'scale(1)'}
        />
        {product.category && (
          <span className="badge-category" style={{ position: 'absolute', top: 12, left: 12 }}>
            {product.category.name || product.category}
          </span>
        )}
      </div>
      <div className="card-body p-4">
        <h5 className="card-title fw-bold">{product.name || product.title}</h5>
        <p className="card-text small text-muted mb-3">
          {(product.short_description || product.description || '').substring(0, 120)}
        </p>
        <Link to={`/products/${product.slug}`} className="btn btn-outline-primary btn-sm w-100">
          View Details
        </Link>
      </div>
    </div>
  )
}
