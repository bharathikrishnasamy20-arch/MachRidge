import { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import { getProducts } from '../../api/services'
import SectionTitle from '../common/SectionTitle'
import Loader from '../common/Loader'

export default function FeaturedProducts() {
  const [products, setProducts] = useState([])
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    getProducts({ limit: 4 })
      .then((res) => setProducts(res.data || res.products || []))
      .catch(() => setProducts([]))
      .finally(() => setLoading(false))
  }, [])

  if (loading) return <Loader />

  return (
    <section className="section-padding" style={{ background: 'var(--light)' }}>
      <div className="container">
        <SectionTitle title="Featured Products" subtitle="Explore our precision-engineered product range" />
        <div className="row g-4">
          {products.map((p, i) => (
            <div className="col-md-6 col-lg-3" key={p.id || i} data-aos="fade-up" data-aos-delay={i * 100}>
              <div className="card h-100 border-0">
                <div style={{ height: 220, overflow: 'hidden', position: 'relative' }}>
                  <img
                    src={p.image || `/images/machine/lathe-operator.jpg`}
                    alt={p.title}
                    className="w-100 h-100"
                    style={{ objectFit: 'cover', transition: 'transform 0.5s ease' }}
                    onMouseEnter={(e) => e.currentTarget.style.transform = 'scale(1.1)'}
                    onMouseLeave={(e) => e.currentTarget.style.transform = 'scale(1)'}
                  />
                  {p.category && (
                    <span className="badge-category" style={{ position: 'absolute', top: 12, left: 12 }}>
                      {p.category.name || p.category}
                    </span>
                  )}
                </div>
                <div className="card-body p-4">
                  <h5 className="card-title fw-bold">{p.name || p.title}</h5>
                  <p className="card-text small text-muted mb-3">
                    {(p.short_description || p.description || '').substring(0, 100)}
                  </p>
                  <Link to={`/products/${p.slug}`} className="btn btn-outline-primary btn-sm w-100">
                    View Details
                  </Link>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </section>
  )
}
