export default function WhatsAppButton() {
  return (
    <a
      href="https://wa.me/1234567890"
      target="_blank"
      rel="noopener noreferrer"
      className="whatsapp-btn"
      style={{
        position: 'fixed',
        bottom: 90,
        right: 20,
        zIndex: 999,
        width: 56,
        height: 56,
        borderRadius: '50%',
        background: '#25D366',
        color: '#fff',
        display: 'flex',
        alignItems: 'center',
        justifyContent: 'center',
        fontSize: '1.5rem',
        boxShadow: '0 4px 15px rgba(37,211,102,0.4)',
        textDecoration: 'none',
        animation: 'pulse 2s infinite',
      }}
    >
      <i className="bi bi-whatsapp"></i>
    </a>
  )
}
