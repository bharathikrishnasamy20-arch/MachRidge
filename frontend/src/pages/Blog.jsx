import { useState, useEffect } from 'react'
import { Link } from 'react-router-dom'
import SEO from '../seo/SEO'
import PageHeader from '../components/layout/PageHeader'
import Loader from '../components/common/Loader'
import { getBlogs } from '../api/services'

export default function Blog() {
  const [blogs, setBlogs] = useState([])
  const [loading, setLoading] = useState(true)
  const [search, setSearch] = useState('')
  const [page, setPage] = useState(1)
  const [totalPages, setTotalPages] = useState(1)

  useEffect(() => {
    setLoading(true)
    const params = { page, per_page: 6 }
    if (search) params.search = search
    getBlogs(params)
      .then((res) => {
        setBlogs(res.data || res.blogs || res.posts || [])
        setTotalPages(res.last_page || res.meta?.last_page || Math.ceil((res.total || 0) / 6) || 1)
      })
      .catch(() => setBlogs([]))
      .finally(() => setLoading(false))
  }, [page, search])

  return (
    <>
      <SEO title="Blog" description="Read the latest news, insights, and updates from MachRidge Industries." />
      <PageHeader title="Our Blog" subtitle="Industry insights, news, and technical articles" breadcrumbs={[{ label: 'Blog' }]} />
      <section className="section-padding">
        <div className="container">
          <div className="row mb-4">
            <div className="col-lg-6 mx-auto">
              <div className="input-group">
                <span className="input-group-text bg-white border-end-0">
                  <i className="bi bi-search text-muted"></i>
                </span>
                <input
                  type="text"
                  className="form-control border-start-0 ps-0"
                  placeholder="Search articles..."
                  value={search}
                  onChange={(e) => { setSearch(e.target.value); setPage(1) }}
                />
              </div>
            </div>
          </div>
          {loading ? <Loader /> : (
            <>
              {blogs.length === 0 ? (
                <div className="text-center py-5">
                  <i className="bi bi-newspaper" style={{ fontSize: '3rem', color: 'var(--accent)' }}></i>
                  <h5 className="mt-3 text-muted">No articles found</h5>
                </div>
              ) : (
                <div className="row g-4">
                  {blogs.map((blog, i) => (
                    <div className="col-md-6 col-lg-4" key={blog.id || i} data-aos="fade-up" data-aos-delay={(i % 3) * 100}>
                      <div className="card h-100 border-0">
                        <div style={{ height: 220, overflow: 'hidden' }}>
                          <img
                            src={blog.image || `/images/machine/engineers-workshop.jpg`}
                            alt={blog.title}
                            className="w-100 h-100"
                            style={{ objectFit: 'cover', transition: 'transform 0.5s ease' }}
                            onMouseEnter={(e) => e.currentTarget.style.transform = 'scale(1.1)'}
                            onMouseLeave={(e) => e.currentTarget.style.transform = 'scale(1)'}
                          />
                        </div>
                        <div className="card-body p-4">
                          <div className="d-flex align-items-center gap-3 mb-2">
                            <small className="text-muted"><i className="bi bi-calendar me-1"></i>{new Date(blog.created_at || blog.date).toLocaleDateString()}</small>
                            {blog.author && <small className="text-muted"><i className="bi bi-person me-1"></i>{blog.author}</small>}
                          </div>
                          <h5 className="card-title fw-bold">{blog.title}</h5>
                          <p className="card-text small text-muted mb-3">
                            {(blog.short_description || blog.excerpt || blog.content || '').substring(0, 120)}
                          </p>
                          <Link to={`/blog/${blog.slug}`} className="btn btn-outline-primary btn-sm">
                            Read More
                          </Link>
                        </div>
                      </div>
                    </div>
                  ))}
                </div>
              )}
              {totalPages > 1 && (
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
            </>
          )}
        </div>
      </section>
    </>
  )
}
