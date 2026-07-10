import { useState, useEffect } from 'react'

export default function BackToTop() {
  const [visible, setVisible] = useState(false)

  useEffect(() => {
    const onScroll = () => setVisible(window.scrollY > 400)
    window.addEventListener('scroll', onScroll)
    return () => window.removeEventListener('scroll', onScroll)
  }, [])

  const scrollToTop = () => window.scrollTo({ top: 0, behavior: 'smooth' })

  return (
    <button
      onClick={scrollToTop}
      className="btn btn-primary"
      style={{
        position: 'fixed',
        bottom: 25,
        right: 20,
        zIndex: 999,
        width: 46,
        height: 46,
        borderRadius: '50%',
        padding: 0,
        display: visible ? 'flex' : 'none',
        alignItems: 'center',
        justifyContent: 'center',
        fontSize: '1.1rem',
        opacity: visible ? 1 : 0,
        transition: 'opacity 0.3s',
        border: 'none',
      }}
    >
      <i className="bi bi-arrow-up"></i>
    </button>
  )
}
