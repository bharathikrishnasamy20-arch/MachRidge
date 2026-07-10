import SEO from '../seo/SEO'
import HeroSlider from '../components/home/HeroSlider'
import CompanyIntro from '../components/home/CompanyIntro'
import WhyChooseUs from '../components/home/WhyChooseUs'
import FeaturedProducts from '../components/home/FeaturedProducts'
import VideoShowcase from '../components/home/VideoShowcase'
import ManufacturingProcess from '../components/home/ManufacturingProcess'
import IndustriesServed from '../components/home/IndustriesServed'
import Testimonials from '../components/home/Testimonials'
import CTASection from '../components/home/CTASection'

export default function Home() {
  return (
    <>
      <SEO
        title="Precision Manufacturing & CNC Machining"
        description="MachRidge Industries - Your trusted partner for precision CNC machining, advanced manufacturing, and quality fabrication services."
      />
      <HeroSlider />
      <CompanyIntro />
      <WhyChooseUs />
      <FeaturedProducts />
      <VideoShowcase />
      <ManufacturingProcess />
      <IndustriesServed />
      <Testimonials />
      <CTASection />
    </>
  )
}
