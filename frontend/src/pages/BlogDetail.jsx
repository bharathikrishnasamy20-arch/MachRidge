import { useState, useEffect } from 'react'
import { useParams, Link } from 'react-router-dom'
import SEO from '../seo/SEO'
import Loader from '../components/common/Loader'
import { getBlog, getBlogs } from '../api/services'

export default function BlogDetail() {
  const { slug } = useParams()
  const [blog, setBlog] = useState(null)
  const [related, setRelated] = useState([])
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    setLoading(true)
    getBlog(slug)
      .then((res) => setBlog(res.data || res.blog || res.post || res))
      .catch(() => setBlog(null))
      .finally(() => setLoading(false))

    getBlogs({ limit: 3 })
      .then((res) => setRelated((res.data || res.blogs || res.posts || []).filter((b) => b.slug !== slug).slice(0, 3)))
      .catch(() => {})
  }, [slug])

  if (loading) return <div className="pt-5"><Loader /></div>
  if (!blog) return (
    <div className="pt-5 text-center" style={{ paddingTop: 120 }}>
      <h3>Article not found</h3>
      <Link to="/blog" className="btn btn-primary mt-3">Back to Blog</Link>
    </div>
  )

  return (
    <>
      <SEO title={blog.title} description={blog.short_description || blog.excerpt || ''} ogType="article" />
      <section style={{ padding: '120px 0 40px', background: 'var(--light)' }}>
        <div className="container">
          <nav className="mb-3">
            <ol className="breadcrumb">
              <li className="breadcrumb-item"><Link to="/">Home</Link></li>
              <li className="breadcrumb-item"><Link to="/blog">Blog</Link></li>
              <li className="breadcrumb-item active">{blog.title}</li>
            </ol>
          </nav>
        </div>
      </section>
      <article className="section-padding pt-0">
        <div className="container">
          <div className="row justify-content-center">
            <div className="col-lg-8">
              {blog.image && (
                <div className="mb-4 rounded-3 overflow-hidden" style={{ boxShadow: 'var(--shadow-lg)' }}>
                  <img src={blog.image} alt={blog.title} className="w-100" style={{ maxHeight: 500, objectFit: 'cover', display: 'block' }} />
                </div>
              )}
              <h1 className="fw-bold mb-3">{blog.title}</h1>
              <div className="d-flex align-items-center gap-4 mb-4 text-muted small">
                <span><i className="bi bi-calendar me-1"></i>{new Date(blog.created_at || blog.date).toLocaleDateString()}</span>
                {blog.author && <span><i className="bi bi-person me-1"></i>{blog.author}</span>}
                {blog.category && <span><i className="bi bi-folder me-1"></i>{blog.category.name || blog.category}</span>}
              </div>
              <div style={{ lineHeight: 1.9, color: '#5a5a5a' }}>
                {blog.content && blog.content.split('\n').map((p, i) => <p key={i}>{p}</p>)}
                {!blog.content && <p>{blog.description || blog.body}</p>}
              </div>
              <hr className="my-5" />
              <div className="d-flex justify-content-between align-items-center">
                <div className="d-flex gap-2">
                  <a href={`https://www.facebook.com/sharer/sharer.php?u=${window.location.href}`} target="_blank" rel="noopener noreferrer" className="btn btn-outline-primary btn-sm"><i className="bi bi-facebook"></i></a>
                  <a href={`https://twitter.com/intent/tweet?url=${window.location.href}&text=${blog.title}`} target="_blank" rel="noopener noreferrer" className="btn btn-outline-primary btn-sm"><i className="bi bi-twitter-x"></i></a>
                  <a href={`https://www.linkedin.com/shareArticle?mini=true&url=${window.location.href}`} target="_blank" rel="noopener noreferrer" className="btn btn-outline-primary btn-sm"><i className="bi bi-linkedin"></i></a>
                </div>
              </div>
              {related.length > 0 && (
                <div className="mt-5 pt-4 border-top">
                  <h4 className="fw-bold mb-4">Related Articles</h4>
                  <div className="row g-4">
                    {related.map((r, i) => (
                      <div className="col-md-4" key={i}>
                        <div className="card h-100 border-0">
                          <div style={{ height: 160, overflow: 'hidden' }}>
                            <img src={r.image || '/images/machine/engineers-workshop.jpg'} alt={r.title} className="w-100 h-100" style={{ objectFit: 'cover' }} />
                          </div>
                          <div className="card-body p-3">
                            <h6 className="fw-bold">{r.title}</h6>
                            <Link to={`/blog/${r.slug}`} className="btn btn-outline-primary btn-sm w-100">Read More</Link>
                          </div>
                        </div>
                      </div>
                    ))}
                  </div>
                </div>
              )}
            </div>
          </div>
        </div>
      </article>
    </>
  )
}
