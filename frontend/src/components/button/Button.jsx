export default function Button({ id = null, type = "button", children }) {
  return (
    <button id={id} type={type}>
      {children}
    </button>
  );
}
