import { useState, useEffect } from 'react'
import SEO from '../seo/SEO'
import PageHeader from '../components/layout/PageHeader'
import Loader from '../components/common/Loader'
import { getGallery } from '../api/services'

const fallbackImages = [
  '/images/machine/lathe-steel-processing.jpg',
  '/images/machine/lathe-operator.jpg',
  '/images/machine/turning-machine-operator.jpg',
  '/images/machine/metalworker-grinding.jpg',
  '/images/inspection/digital-caliper-measuring.jpg',
  '/images/inspection/caliper-metal-surface.jpg',
]

export default function Gallery() {
  const [images, setImages] = useState(fallbackImages)
  const [loading, setLoading] = useState(true)
  const [selected, setSelected] = useState(null)

  useEffect(() => {
    getGallery()
      .then((res) => setImages(res.data || res.images || res.gallery || fallbackImages))
      .catch(() => {})
      .finally(() => setLoading(false))
  }, [])

  return (
    <>
      <SEO title="Gallery" description="Browse our manufacturing facility, equipment, and product gallery." />
      <PageHeader title="Gallery" subtitle="A glimpse into our manufacturing facility" breadcrumbs={[{ label: 'Gallery' }]} />
      <section className="section-padding">
        <div className="container">
          {loading ? <Loader /> : (
            <div className="row g-3">
              {images.map((img, i) => (
                <div className="col-md-4 col-lg-3" key={i} data-aos="zoom-in" data-aos-delay={(i % 4) * 80}>
                  <div
                    className="rounded-3 overflow-hidden"
                    style={{ cursor: 'pointer', height: 250, boxShadow: 'var(--shadow-sm)', transition: 'var(--transition)' }}
                    onMouseEnter={(e) => { e.currentTarget.style.transform = 'scale(1.03)'; e.currentTarget.style.boxShadow = 'var(--shadow-md)' }}
                    onMouseLeave={(e) => { e.currentTarget.style.transform = 'scale(1)'; e.currentTarget.style.boxShadow = 'var(--shadow-sm)' }}
                    onClick={() => setSelected(img)}
                  >
                    <img src={typeof img === 'string' ? img : img.url || img.image} alt="" className="w-100 h-100" style={{ objectFit: 'cover' }} />
                  </div>
                </div>
              ))}
            </div>
          )}
        </div>
      </section>

      {selected && (
        <div
          className="d-flex align-items-center justify-content-center"
          style={{
            position: 'fixed', top: 0, left: 0, right: 0, bottom: 0,
            background: 'rgba(0,0,0,0.9)', zIndex: 9999, cursor: 'pointer',
          }}
          onClick={() => setSelected(null)}
        >
          <button
            className="btn text-white position-absolute"
            style={{ top: 20, right: 20, fontSize: '2rem', border: 'none', background: 'none' }}
            onClick={() => setSelected(null)}
          >
            <i className="bi bi-x-lg"></i>
          </button>
          <img
            src={typeof selected === 'string' ? selected : selected.url || selected.image}
            alt=""
            style={{ maxWidth: '90%', maxHeight: '90%', objectFit: 'contain' }}
          />
        </div>
      )}
    </>
  )
}
