import { useState, useEffect } from 'react'
import SEO from '../seo/SEO'
import PageHeader from '../components/layout/PageHeader'
import SectionTitle from '../components/common/SectionTitle'
import Loader from '../components/common/Loader'
import { getCapabilities, getInspectionEquipment } from '../api/services'

const defaultCapabilities = [
  { icon: 'bi-gear', title: 'CNC Milling', desc: '3, 4, and 5-axis CNC milling for complex geometries with tight tolerances.' },
  { icon: 'bi-arrow-up-circle', title: 'CNC Turning', desc: 'Precision CNC turning and boring operations for cylindrical components.' },
  { icon: 'bi-bounding-box-circles', title: 'Surface Grinding', desc: 'High-precision surface grinding with micron-level accuracy.' },
  { icon: 'bi-tools', title: 'EDM Machining', desc: 'Wire and sinker EDM for intricate details and hardened materials.' },
  { icon: 'bi-wrench', title: 'Assembly', desc: 'Complete sub-assembly and final assembly services with testing.' },
  { icon: 'bi-pencil-ruler', title: 'CAD/CAM Engineering', desc: 'In-house design and programming for optimized manufacturing.' },
]

const defaultEquipment = [
  { name: 'CMM (Coordinate Measuring Machine)', description: 'Hexagon Global Classic 07.10.07 with PC-DMIS software' },
  { name: 'Optical Comparator', description: 'Mitutoyo PH-A3000 with 300mm screen' },
  { name: 'Surface Roughness Tester', description: 'Mitutoyo SJ-210 with multiple parameters' },
  { name: 'Hardness Tester', description: 'Rockwell and Brinell hardness testing' },
  { name: 'Vision Measurement System', description: 'Nikon VMR-300 with auto-edge detection' },
  { name: 'Micrometers & Gauges', description: 'Full range of precision instruments certified to NIST standards' },
]

export default function Capabilities() {
  const [capabilities, setCapabilities] = useState(defaultCapabilities)
  const [equipment, setEquipment] = useState(defaultEquipment)
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    Promise.all([
      getCapabilities().then(r => r.data || r.capabilities || []).catch(() => defaultCapabilities),
      getInspectionEquipment().then(r => r.data || r.equipment || []).catch(() => defaultEquipment),
    ])
      .then(([caps, equip]) => {
        if (caps.length) setCapabilities(caps)
        if (equip.length) setEquipment(equip)
      })
      .finally(() => setLoading(false))
  }, [])

  if (loading) return <div><div style={{ height: 100 }} /><Loader /></div>

  return (
    <>
      <SEO title="Capabilities" description="Explore our advanced manufacturing capabilities and state-of-the-art inspection equipment." />
      <PageHeader title="Our Capabilities" subtitle="Advanced manufacturing technology meets precision engineering" breadcrumbs={[{ label: 'Capabilities' }]} />
      <section className="section-padding">
        <div className="container">
          <SectionTitle title="Manufacturing Capabilities" subtitle="Comprehensive precision manufacturing services" />
          <div className="row g-4">
            {capabilities.map((cap, i) => (
              <div className="col-md-6 col-lg-4" key={i} data-aos="fade-up" data-aos-delay={i * 80}>
                <div className="card h-100 p-4 border-0" style={{ borderRadius: 'var(--radius-lg)' }}
                  onMouseEnter={(e) => { e.currentTarget.style.transform = 'translateY(-8px)'; e.currentTarget.style.boxShadow = '0 15px 40px rgba(26,82,118,0.12)' }}
                  onMouseLeave={(e) => { e.currentTarget.style.transform = 'translateY(0)'; e.currentTarget.style.boxShadow = 'var(--shadow-sm)' }}
                >
                  <div className="d-flex align-items-center gap-3 mb-3">
                    <div className="d-flex align-items-center justify-content-center flex-shrink-0"
                      style={{ width: 55, height: 55, borderRadius: '50%', background: 'var(--gradient)', fontSize: '1.4rem', color: '#fff' }}
                    >
                      <i className={`bi ${cap.icon || 'bi-gear'}`}></i>
                    </div>
                    <h5 className="fw-bold mb-0">{cap.title || cap.name}</h5>
                  </div>
                  <p className="card-text small text-muted mb-0">{cap.description || cap.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
      <section className="section-padding" style={{ background: 'var(--light)' }}>
        <div className="container">
          <SectionTitle title="Inspection Equipment" subtitle="Precision measurement and quality assurance tools" />
          <div className="row g-4">
            {equipment.map((eq, i) => (
              <div className="col-md-6 col-lg-4" key={i} data-aos="fade-up" data-aos-delay={i * 80}>
                <div className="card h-100 p-4 border-0" style={{ borderRadius: 'var(--radius-lg)' }}
                  onMouseEnter={(e) => { e.currentTarget.style.transform = 'translateY(-5px)'; e.currentTarget.style.boxShadow = 'var(--shadow-md)' }}
                  onMouseLeave={(e) => { e.currentTarget.style.transform = 'translateY(0)'; e.currentTarget.style.boxShadow = 'var(--shadow-sm)' }}
                >
                  <h5 className="fw-bold mb-2">{eq.name}</h5>
                  <p className="small text-muted mb-0">{eq.description}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </>
  )
}
