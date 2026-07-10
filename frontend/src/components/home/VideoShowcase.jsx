import { useState } from 'react'
import SectionTitle from '../common/SectionTitle'

const videos = [
  { id: 'CbipVFQsP3w', label: 'Advanced CNC Machining' },
  { id: 'hy3d4OIpbec', label: 'Precision Engineering' },
  { id: '9GZACc8VdpY', label: 'Manufacturing Technology' },
]

export default function VideoShowcase() {
  const [current, setCurrent] = useState(0)
  const [playing, setPlaying] = useState(false)
  const video = videos[current]

  const prev = () => { setPlaying(false); setCurrent((p) => (p - 1 + videos.length) % videos.length) }
  const next = () => { setPlaying(false); setCurrent((p) => (p + 1) % videos.length) }

  return (
    <section className="section-padding video-showcase" style={{ background: 'var(--dark)' }}>
      <div className="container">
        <SectionTitle
          title="See Our Manufacturing in Action"
          subtitle="Watch how precision engineering meets advanced CNC technology"
          light
        />
        <div className="position-relative" data-aos="fade-up">
          <div className="row justify-content-center">
            <div className="col-lg-10">
              <div className="video-wrapper" onClick={!playing ? () => setPlaying(true) : undefined}>
                {playing ? (
                  <iframe
                    src={`https://www.youtube.com/embed/${video.id}?autoplay=1&rel=0`}
                    title={video.label}
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope"
                    allowFullScreen
                    className="video-iframe"
                  />
                ) : (
                  <>
                    <img
                      src={`https://img.youtube.com/vi/${video.id}/maxresdefault.jpg`}
                      alt={video.label}
                      className="video-poster"
                    />
                    <div className="video-overlay" />
                    <div className="play-btn">
                      <i className="bi bi-play-fill"></i>
                    </div>
                    <div className="video-label">
                      <i className="bi bi-camera-video me-2"></i>
                      {video.label}
                    </div>
                  </>
                )}
              </div>
            </div>
          </div>
          <button className="video-nav video-prev" onClick={prev}><i className="bi bi-chevron-left"></i></button>
          <button className="video-nav video-next" onClick={next}><i className="bi bi-chevron-right"></i></button>
          <div className="video-counter">{String(current + 1).padStart(2, '0')} / {String(videos.length).padStart(2, '0')}</div>
        </div>
      </div>
    </section>
  )
}
