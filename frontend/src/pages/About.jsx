import SEO from '../seo/SEO'
import PageHeader from '../components/layout/PageHeader'
import CompanyOverview from '../components/about/CompanyOverview'
import MissionVision from '../components/about/MissionVision'
import CoreValues from '../components/about/CoreValues'

export default function About() {
  return (
    <>
      <SEO
        title="About Us"
        description="Learn about MachRidge Industries' history, mission, and commitment to precision manufacturing excellence."
      />
      <PageHeader
        title="About Us"
        subtitle="Over two decades of precision manufacturing excellence"
        breadcrumbs={[{ label: 'About Us' }]}
      />
      <CompanyOverview />
      <MissionVision />
      <CoreValues />
      <section className="section-padding" style={{ background: 'var(--gradient)' }}>
        <div className="container text-center">
          <h2 className="text-white fw-bold mb-3" data-aos="fade-up">Ready to Work With Us?</h2>
          <p className="text-white-50 mb-4" data-aos="fade-up" style={{ maxWidth: 500, margin: '0 auto' }}>
            Let's discuss your manufacturing needs. Our team is ready to provide the precision you deserve.
          </p>
          <div data-aos="fade-up">
            <a href="/contact" className="btn btn-light fw-bold px-4" style={{ color: 'var(--primary)' }}>
              Get in Touch
            </a>
          </div>
        </div>
      </section>
    </>
  )
}
