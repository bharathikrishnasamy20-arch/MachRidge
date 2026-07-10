import { useState } from 'react'

export default function ProductGallery({ images = [], mainImage }) {
  const allImages = images.length > 0 ? images : [mainImage || '/images/machine/lathe-operator.jpg']
  const [selected, setSelected] = useState(0)

  return (
    <div>
      <div
        className="mb-3 rounded-3 overflow-hidden"
        style={{ background: '#f8f9fa', boxShadow: 'var(--shadow-sm)' }}
      >
        <img
          src={allImages[selected]}
          alt="Product"
          className="w-100"
          style={{ height: 450, objectFit: 'cover', display: 'block' }}
        />
      </div>
      {allImages.length > 1 && (
        <div className="d-flex gap-2 flex-wrap">
          {allImages.map((img, i) => (
            <button
              key={i}
              className="btn p-0 rounded-2 overflow-hidden"
              style={{
                width: 80, height: 80,
                border: i === selected ? '3px solid var(--primary)' : '3px solid transparent',
                opacity: i === selected ? 1 : 0.6,
                transition: 'all 0.3s',
              }}
              onClick={() => setSelected(i)}
            >
              <img src={img} alt="" className="w-100 h-100" style={{ objectFit: 'cover' }} />
            </button>
          ))}
        </div>
      )}
    </div>
  )
}
