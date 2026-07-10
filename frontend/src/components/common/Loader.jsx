export default function Loader() {
  return (
    <div
      className="d-flex justify-content-center align-items-center"
      style={{ minHeight: 300 }}
    >
      <div
        className="spinner-border"
        style={{ width: '3rem', height: '3rem', color: 'var(--primary)' }}
        role="status"
      >
        <span className="visually-hidden">Loading...</span>
      </div>
    </div>
  )
}
