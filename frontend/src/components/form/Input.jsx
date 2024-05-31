export default function Input({ id, type, value, onChange = null }) {
  return (
    <input id={id} type={type} name={id} value={value} onChange={onChange} />
  );
}
