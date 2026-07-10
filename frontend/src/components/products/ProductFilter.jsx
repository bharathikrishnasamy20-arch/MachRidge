export default function ProductFilter({ categories, selected, onSelect, search, onSearchChange }) {
  return (
    <div className="mb-4">
      <div className="row g-3 align-items-center">
        <div className="col-lg-6">
          <div className="d-flex flex-wrap gap-2">
            <button
              className={`btn btn-sm ${!selected ? 'btn-primary' : 'btn-outline-primary'}`}
              onClick={() => onSelect(null)}
            >
              All
            </button>
            {categories.map((cat) => (
              <button
                key={cat.id || cat.slug || cat}
                className={`btn btn-sm ${selected === (cat.slug || cat) ? 'btn-primary' : 'btn-outline-primary'}`}
                onClick={() => onSelect(cat.slug || cat)}
              >
                {cat.name || cat}
              </button>
            ))}
          </div>
        </div>
        <div className="col-lg-4 offset-lg-2">
          <div className="input-group">
            <span className="input-group-text bg-white border-end-0">
              <i className="bi bi-search text-muted"></i>
            </span>
            <input
              type="text"
              className="form-control border-start-0 ps-0"
              placeholder="Search products..."
              value={search}
              onChange={(e) => onSearchChange(e.target.value)}
            />
          </div>
        </div>
      </div>
    </div>
  )
}
