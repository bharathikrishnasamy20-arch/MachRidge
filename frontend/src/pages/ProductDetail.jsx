import { useState, useEffect } from 'react'
import { useParams, Link } from 'react-router-dom'
import SEO from '../seo/SEO'
import Loader from '../components/common/Loader'
import ProductGallery from '../components/product-detail/ProductGallery'
import ProductSpecs from '../components/product-detail/ProductSpecs'
import RelatedProducts from '../components/product-detail/RelatedProducts'
import { getProduct } from '../api/services'

export default function ProductDetail() {
  const { slug } = useParams()
  const [product, setProduct] = useState(null)
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    setLoading(true)
    getProduct(slug)
      .then((res) => setProduct(res.data || res.product || res))
      .catch(() => setProduct(null))
      .finally(() => setLoading(false))
  }, [slug])

  if (loading) return <div className="pt-5"><Loader /></div>
  if (!product) return (
    <div className="pt-5 text-center" style={{ paddingTop: 120 }}>
      <h3>Product not found</h3>
      <Link to="/products" className="btn btn-primary mt-3">Back to Products</Link>
    </div>
  )

  const specs = product.specifications || product.specs || []
  const applications = product.applications || []
  const industries = product.industries || []
  const images = product.gallery || product.images || []
  const category = product.category

  return (
    <>
      <SEO title={product.name || product.title} description={product.short_description || product.description} />
      <section style={{ padding: '120px 0 40px', background: 'var(--light)' }}>
        <div className="container">
          <nav className="breadcrumb-nav mb-3">
            <ol className="breadcrumb">
              <li className="breadcrumb-item"><Link to="/">Home</Link></li>
              <li className="breadcrumb-item"><Link to="/products">Products</Link></li>
              {category && <li className="breadcrumb-item"><Link to={`/products?category=${category.slug || category}`}>{category.name || category}</Link></li>}
              <li className="breadcrumb-item active">{product.name || product.title}</li>
            </ol>
          </nav>
        </div>
      </section>
      <section className="section-padding pt-0">
        <div className="container">
          <div className="row g-5">
            <div className="col-lg-6">
              <ProductGallery images={images} mainImage={product.image} />
            </div>
            <div className="col-lg-6">
              <h2 className="fw-bold mb-2">{product.name || product.title}</h2>
              {category && (
                <span className="badge-category d-inline-block mb-3">
                  {category.name || category}
                </span>
              )}
              <p style={{ lineHeight: 1.8, color: '#5a5a5a' }}>{product.description}</p>

              {applications.length > 0 && (
                <div className="mt-4">
                  <h6 className="fw-bold mb-2">Applications</h6>
                  <ul className="list-unstyled">
                    {applications.map((app, i) => (
                      <li key={i} className="mb-1 small"><i className="bi bi-check-circle text-primary me-2"></i>{app.name || app}</li>
                    ))}
                  </ul>
                </div>
              )}

              {industries.length > 0 && (
                <div className="mt-3">
                  <h6 className="fw-bold mb-2">Industries</h6>
                  <div className="d-flex flex-wrap gap-2">
                    {industries.map((ind, i) => (
                      <span key={i} className="badge bg-secondary">{ind.name || ind}</span>
                    ))}
                  </div>
                </div>
              )}

              <div className="mt-4 d-flex gap-3">
                <Link to="/contact" className="btn btn-primary">
                  <i className="bi bi-chat-dots me-2"></i>Request Quote
                </Link>
                <a href={`https://wa.me/1234567890?text=Inquiry about ${product.name || product.title}`} target="_blank" rel="noopener noreferrer" className="btn btn-outline-primary">
                  <i className="bi bi-whatsapp me-2"></i>WhatsApp
                </a>
              </div>
              <ProductSpecs specifications={specs} />
            </div>
          </div>
          <RelatedProducts category={category} currentSlug={slug} />
        </div>
      </section>
    </>
  )
}
