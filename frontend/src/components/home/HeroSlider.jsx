import { useState, useEffect, useCallback } from 'react'
import { Link } from 'react-router-dom'
import { getHeroSliders } from '../../api/services'

const defaultSlides = [
  {
    id: 1,
    title: 'Precision Manufacturing Excellence',
    subtitle: 'State-of-the-art CNC machining and fabrication solutions for industries worldwide.',
    image: '/images/machine/lathe-steel-processing.jpg',
    btn_text: 'Explore Our Capabilities',
    btn_link: '/capabilities',
  },
  {
    id: 2,
    title: 'Advanced CNC Technology',
    subtitle: 'Cutting-edge multi-axis machining for complex components with micron-level precision.',
    image: '/images/machine/lathe-operator.jpg',
    btn_text: 'View Products',
    btn_link: '/products',
  },
  {
    id: 3,
    title: 'Quality You Can Trust',
    subtitle: 'ISO-certified quality management with rigorous inspection at every stage.',
    image: '/images/inspection/digital-caliper-measuring.jpg',
    btn_text: 'Get a Quote',
    btn_link: '/contact',
  },
]

export default function HeroSlider() {
  const [slides, setSlides] = useState(defaultSlides)
  const [current, setCurrent] = useState(0)

  useEffect(() => {
    getHeroSliders()
      .then((res) => {
        const data = res.data || res.sliders || []
        if (data.length > 0) setSlides(data)
      })
      .catch(() => {})
  }, [])

  const next = useCallback(() => setCurrent((p) => (p + 1) % slides.length), [slides.length])
  const prev = useCallback(() => setCurrent((p) => (p - 1 + slides.length) % slides.length), [slides.length])

  useEffect(() => {
    const timer = setInterval(next, 8000)
    return () => clearInterval(timer)
  }, [next])

  return (
    <section className="hero-slider">
      {slides.map((slide, i) => {
        const animClass = i % 3 === 0 ? 'anim-slide-right' : i % 3 === 1 ? 'anim-zoom-out' : 'anim-slide-left'
        return (
        <div key={slide.id} className={`hero-slide ${animClass} ${i === current ? 'active' : ''}`}>
          <img src={slide.image || slide.bg_image} alt="" className="slide-bg" />
          <div className="slide-overlay" />
          <div className="slide-content">
            <div className="container">
              <h1>{slide.title}</h1>
              <p>{slide.subtitle || slide.description}</p>
              <div className="slide-buttons">
                <Link to={slide.btn_link || '/contact'} className="btn btn-primary me-3">
                  {slide.btn_text || 'Get Started'}
                </Link>
                <Link to="/about" className="btn btn-outline-light">
                  Learn More
                </Link>
              </div>
            </div>
          </div>
        </div>
      )
    })}
      <button className="hero-nav prev" onClick={prev}><i className="bi bi-chevron-left"></i></button>
      <button className="hero-nav next" onClick={next}><i className="bi bi-chevron-right"></i></button>
      <div className="hero-dots">
        {slides.map((_, i) => (
          <button
            key={i}
            className={`hero-dot ${i === current ? 'active' : ''}`}
            onClick={() => setCurrent(i)}
          />
        ))}
      </div>
    </section>
  )
}
