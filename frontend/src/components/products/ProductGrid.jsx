import ProductCard from './ProductCard'

export default function ProductGrid({ products, loading }) {
  if (loading) {
    return (
      <div className="row g-4">
        {[1, 2, 3, 4, 5, 6].map((n) => (
          <div className="col-md-6 col-lg-4" key={n}>
            <div className="card border-0">
              <div className="skeleton" style={{ height: 220 }} />
              <div className="card-body p-4">
                <div className="skeleton" style={{ height: 24, width: '70%', marginBottom: 12 }} />
                <div className="skeleton" style={{ height: 16, width: '100%', marginBottom: 8 }} />
                <div className="skeleton" style={{ height: 16, width: '80%', marginBottom: 16 }} />
                <div className="skeleton" style={{ height: 38, width: '100%', borderRadius: 6 }} />
              </div>
            </div>
          </div>
        ))}
      </div>
    )
  }

  if (!products || products.length === 0) {
    return (
      <div className="text-center py-5">
        <i className="bi bi-box-seam" style={{ fontSize: '3rem', color: 'var(--accent)' }}></i>
        <h5 className="mt-3 text-muted">No products found</h5>
        <p className="text-muted small">Try adjusting your search or filter criteria.</p>
      </div>
    )
  }

  return (
    <div className="row g-4">
      {products.map((product) => (
        <div className="col-md-6 col-lg-4" key={product.id || product.slug}>
          <ProductCard product={product} />
        </div>
      ))}
    </div>
  )
}
