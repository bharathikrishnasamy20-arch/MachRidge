import { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import { getProducts } from '../../api/services'

export default function RelatedProducts({ category, currentSlug }) {
  const [products, setProducts] = useState([])

  useEffect(() => {
    if (!category) return
    getProducts({ category: typeof category === 'object' ? category.slug : category, limit: 4 })
      .then((res) => {
        const all = res.data || res.products || []
        setProducts(all.filter((p) => p.slug !== currentSlug).slice(0, 3))
      })
      .catch(() => {})
  }, [category, currentSlug])

  if (products.length === 0) return null

  return (
    <section className="mt-5 pt-4 border-top">
      <h4 className="fw-bold mb-4">Related Products</h4>
      <div className="row g-4">
        {products.map((p) => (
          <div className="col-md-4" key={p.id || p.slug}>
            <div className="card h-100 border-0">
              <div style={{ height: 180, overflow: 'hidden' }}>
                <img
                  src={p.image || '/images/machine/lathe-operator.jpg'}
                  alt={p.title}
                  className="w-100 h-100"
                  style={{ objectFit: 'cover' }}
                />
              </div>
              <div className="card-body p-3">
                <h6 className="fw-bold mb-2">{p.title}</h6>
                <Link to={`/products/${p.slug}`} className="btn btn-outline-primary btn-sm w-100">
                  View Details
                </Link>
              </div>
            </div>
          </div>
        ))}
      </div>
    </section>
  )
}
