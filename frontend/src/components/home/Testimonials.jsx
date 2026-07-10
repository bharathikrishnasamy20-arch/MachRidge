import { useState, useEffect } from 'react'
import { getTestimonials } from '../../api/services'
import SectionTitle from '../common/SectionTitle'
import Loader from '../common/Loader'

const fallback = [
  { id: 1, name: 'John Anderson', designation: 'Operations Director, AeroTech', content: 'Outstanding precision and reliability. MachRidge consistently delivers components that exceed our stringent aerospace specifications.', avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&q=85' },
  { id: 2, name: 'Sarah Chen', designation: 'Procurement Manager, MediDev', content: 'Their commitment to quality and on-time delivery has made them our trusted manufacturing partner for critical medical components.', avatar: 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=100&q=85' },
  { id: 3, name: 'Michael Roberts', designation: 'CEO, Industrial Solutions', content: 'The engineering support and technical expertise at MachRidge is exceptional. They helped optimize our designs for manufacturability.', avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&q=85' },
]

export default function Testimonials() {
  const [testimonials, setTestimonials] = useState(fallback)
  const [loading, setLoading] = useState(true)
  const [current, setCurrent] = useState(0)

  useEffect(() => {
    getTestimonials()
      .then((res) => setTestimonials(res.data || res.testimonials || fallback))
      .catch(() => {})
      .finally(() => setLoading(false))
  }, [])

  useEffect(() => {
    if (testimonials.length <= 1) return
    const timer = setInterval(() => setCurrent((p) => (p + 1) % testimonials.length), 5000)
    return () => clearInterval(timer)
  }, [testimonials.length])

  if (loading) return <Loader />

  return (
    <section className="section-padding" style={{ background: 'var(--gradient)' }}>
      <div className="container">
        <SectionTitle title="What Our Clients Say" subtitle="Trusted by industry leaders worldwide" light />
        <div className="row justify-content-center">
          <div className="col-lg-8 text-center" data-aos="fade-up">
            {testimonials.map((t, i) => (
              <div key={t.id} style={{ display: i === current ? 'block' : 'none' }}>
                <img
                  src={t.avatar}
                  alt={t.name}
                  className="rounded-circle mb-3"
                  style={{ width: 80, height: 80, objectFit: 'cover', border: '3px solid rgba(255,255,255,0.3)' }}
                />
                <p className="text-white mb-3" style={{ fontSize: '1.1rem', lineHeight: 1.8, fontStyle: 'italic' }}>
                  &ldquo;{t.content}&rdquo;
                </p>
                <h6 className="text-white fw-bold mb-1">{t.name}</h6>
                <p className="text-white-50 small mb-0">{t.designation}</p>
              </div>
            ))}
            <div className="d-flex justify-content-center gap-2 mt-4">
              {testimonials.map((_, i) => (
                <button
                  key={i}
                  className="btn p-0"
                  style={{
                    width: 12, height: 12, borderRadius: '50%',
                    background: i === current ? '#fff' : 'rgba(255,255,255,0.3)',
                    border: 'none',
                  }}
                  onClick={() => setCurrent(i)}
                />
              ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}
