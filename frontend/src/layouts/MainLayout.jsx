import { Outlet } from 'react-router-dom'
import Navbar from '../components/layout/Navbar'
import Footer from '../components/layout/Footer'
import ScrollToTop from '../components/layout/ScrollToTop'
import WhatsAppButton from '../components/layout/WhatsAppButton'
import BackToTop from '../components/common/BackToTop'
import useAOS from '../hooks/useAOS'

export default function MainLayout() {
  useAOS()

  return (
    <>
      <ScrollToTop />
      <Navbar />
      <main className="page-transition">
        <Outlet />
      </main>
      <Footer />
      <WhatsAppButton />
      <BackToTop />
    </>
  )
}
