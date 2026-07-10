import { useEffect } from 'react'

const orgSchema = {
  '@context': 'https://schema.org',
  '@type': 'Organization',
  name: 'MachRidge Industries',
  url: 'https://machridgeindustries.com',
  logo: '/images/logo.svg',
  description: 'Precision Manufacturing & CNC Machining Solutions',
  address: { '@type': 'PostalAddress', streetAddress: '123 Industrial Blvd', addressLocality: 'Manufacturing City', addressRegion: 'State', postalCode: '12345', addressCountry: 'US' },
  contactPoint: { '@type': 'ContactPoint', telephone: '+1-234-567-8900', contactType: 'sales' },
}

export default function SEO({ title, description, keywords, ogImage, ogType = 'website', canonical, schema }) {
  const siteName = 'MachRidge Industries'
  const fullTitle = title ? `${title} | ${siteName}` : siteName
  const desc = description || 'Precision manufacturing and CNC machining solutions for various industries.'
  const url = canonical || 'https://machridgeindustries.com'

  useEffect(() => {
    document.title = fullTitle

    const setMeta = (name, content, prop = false) => {
      let el = prop
        ? document.querySelector(`meta[property="${name}"]`)
        : document.querySelector(`meta[name="${name}"]`)
      if (!el) {
        el = document.createElement('meta')
        if (prop) el.setAttribute('property', name)
        else el.setAttribute('name', name)
        document.head.appendChild(el)
      }
      el.setAttribute('content', content)
    }

    setMeta('description', desc)
    setMeta('keywords', keywords || 'CNC machining, precision manufacturing, industrial machining, metal fabrication')
    setMeta('og:title', fullTitle, true)
    setMeta('og:description', desc, true)
    setMeta('og:url', url, true)
    setMeta('og:type', ogType, true)
    setMeta('og:image', ogImage || '/images/logo.svg', true)
    setMeta('twitter:card', 'summary_large_image')
    setMeta('twitter:title', fullTitle)
    setMeta('twitter:description', desc)
    setMeta('twitter:image', ogImage || '/images/logo.svg', true)

    let link = document.querySelector('link[rel="canonical"]')
    if (!link) {
      link = document.createElement('link')
      link.setAttribute('rel', 'canonical')
      document.head.appendChild(link)
    }
    link.setAttribute('href', url)

    let schemaEl = document.querySelector('script[type="application/ld+json"]')
    if (!schemaEl) {
      schemaEl = document.createElement('script')
      schemaEl.setAttribute('type', 'application/ld+json')
      document.head.appendChild(schemaEl)
    }
    schemaEl.textContent = JSON.stringify(schema || orgSchema)
  }, [fullTitle, desc, keywords, url, ogImage, ogType])

  return null
}
