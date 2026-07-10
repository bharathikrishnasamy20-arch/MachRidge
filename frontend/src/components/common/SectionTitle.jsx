export default function SectionTitle({ title, subtitle, light = false, center = true }) {
  return (
    <div className={`section-title ${center ? 'text-center' : ''}`} data-aos="fade-up">
      <h2 style={{ color: light ? '#fff' : undefined }}>{title}</h2>
      {subtitle && (
        <p style={light ? { color: 'rgba(255,255,255,0.7)' } : undefined}>{subtitle}</p>
      )}
    </div>
  )
}
