import { useState, useEffect, useCallback } from 'react'
import SEO from '../seo/SEO'
import PageHeader from '../components/layout/PageHeader'
import ProductFilter from '../components/products/ProductFilter'
import ProductGrid from '../components/products/ProductGrid'
import { getProducts, getProductCategories } from '../api/services'

export default function Products() {
  const [products, setProducts] = useState([])
  const [categories, setCategories] = useState([])
  const [selectedCategory, setSelectedCategory] = useState(null)
  const [search, setSearch] = useState('')
  const [loading, setLoading] = useState(true)
  const [page, setPage] = useState(1)
  const [totalPages, setTotalPages] = useState(1)

  const fetchProducts = useCallback(() => {
    setLoading(true)
    const params = { page, per_page: 9 }
    if (selectedCategory) params.category_id = selectedCategory
    if (search) params.search = search
    getProducts(params)
      .then((res) => {
        setProducts(res.data || [])
        setTotalPages(res.meta?.last_page || res.last_page || 1)
      })
      .catch(() => setProducts([]))
      .finally(() => setLoading(false))
  }, [page, selectedCategory, search])

  useEffect(() => {
    getProductCategories()
      .then((res) => setCategories(res.data || res.categories || []))
      .catch(() => {})
  }, [])

  useEffect(() => {
    fetchProducts()
  }, [fetchProducts])

  useEffect(() => {
    setPage(1)
  }, [selectedCategory, search])

  return (
    <>
      <SEO
        title="Products"
        description="Explore our comprehensive range of precision-manufactured products and components."
      />
      <PageHeader
        title="Our Products"
        subtitle="Precision-engineered components for every industry"
        breadcrumbs={[{ label: 'Products' }]}
      />
      <section className="section-padding">
        <div className="container">
          <ProductFilter
            categories={categories}
            selected={selectedCategory}
            onSelect={setSelectedCategory}
            search={search}
            onSearchChange={setSearch}
          />
          <ProductGrid products={products} loading={loading} />
          {totalPages > 1 && !loading && (
            <div className="d-flex justify-content-center mt-5">
              <nav>
                <ul className="pagination">
                  <li className={`page-item ${page <= 1 ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={() => setPage((p) => Math.max(1, p - 1))}>Prev</button>
                  </li>
                  {Array.from({ length: totalPages }, (_, i) => i + 1).map((p) => (
                    <li key={p} className={`page-item ${page === p ? 'active' : ''}`}>
                      <button className="page-link" onClick={() => setPage(p)}>{p}</button>
                    </li>
                  ))}
                  <li className={`page-item ${page >= totalPages ? 'disabled' : ''}`}>
                    <button className="page-link" onClick={() => setPage((p) => Math.min(totalPages, p + 1))}>Next</button>
                  </li>
                </ul>
              </nav>
            </div>
          )}
        </div>
      </section>
    </>
  )
}
