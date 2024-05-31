export default function Button({ id = null, type, children }) {
  return (
    <button id={id} type={type}>
      {children}
    </button>
  );
}
