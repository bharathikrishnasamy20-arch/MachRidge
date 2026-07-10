import { Swiper, SwiperSlide } from 'swiper/react'
import { Autoplay, Navigation, Pagination } from 'swiper/modules'
import 'swiper/css'
import 'swiper/css/navigation'
import 'swiper/css/pagination'
import SectionTitle from '../common/SectionTitle'

const industries = [
  { icon: 'bi-rocket-takeoff', name: 'Aerospace' },
  { icon: 'bi-car-front', name: 'Automotive' },
  { icon: 'bi-heart-pulse', name: 'Medical' },
  { icon: 'bi-battery-charging', name: 'Energy' },
  { icon: 'bi-gear', name: 'Industrial' },
  { icon: 'bi-cpu', name: 'Electronics' },
  { icon: 'bi-droplet', name: 'Oil & Gas' },
  { icon: 'bi-truck', name: 'Transportation' },
]

export default function IndustriesServed() {
  return (
    <section className="section-padding" style={{ background: 'var(--light)' }}>
      <div className="container">
        <SectionTitle title="Industries We Serve" subtitle="Delivering precision across diverse sectors" />
        <Swiper
          modules={[Autoplay, Navigation, Pagination]}
          spaceBetween={24}
          slidesPerView={2}
          breakpoints={{
            576: { slidesPerView: 2, spaceBetween: 20 },
            768: { slidesPerView: 3, spaceBetween: 24 },
            992: { slidesPerView: 4, spaceBetween: 24 },
            1200: { slidesPerView: 5, spaceBetween: 24 },
          }}
          autoplay={{ delay: 3000, disableOnInteraction: false, pauseOnMouseEnter: true }}
          navigation
          pagination={{ clickable: true }}
          className="industries-slider"
        >
          {industries.map((ind, i) => (
            <SwiperSlide key={i}>
              <div
                className="card text-center border-0 industry-card"
                onMouseEnter={(e) => {
                  e.currentTarget.style.transform = 'translateY(-5px)'
                  e.currentTarget.style.boxShadow = '0 10px 30px rgba(26,82,118,0.12)'
                }}
                onMouseLeave={(e) => {
                  e.currentTarget.style.transform = 'translateY(0)'
                  e.currentTarget.style.boxShadow = 'var(--shadow-sm)'
                }}
              >
                <div className="industry-icon">
                  <i className={`bi ${ind.icon}`}></i>
                </div>
                <h6 className="fw-semibold mb-0">{ind.name}</h6>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
    </section>
  )
}
