export default function ProductSpecs({ specifications = [] }) {
  if (!specifications || specifications.length === 0) return null

  return (
    <div className="mt-4">
      <h4 className="fw-bold mb-3">Specifications</h4>
      <div className="table-responsive">
        <table className="table table-bordered">
          <tbody>
            {specifications.map((spec, i) => (
              <tr key={i}>
                <td className="fw-semibold bg-light" style={{ width: '40%', verticalAlign: 'middle' }}>
                  {spec.label || spec.name || spec.attribute}
                </td>
                <td style={{ verticalAlign: 'middle' }}>{spec.value || spec.detail}</td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  )
}
