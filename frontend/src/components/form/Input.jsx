export default function Input({ id, type, name, value, onChange = null }) {
  return (
    <input id={id} type={type} name={name} value={value} onChange={onChange} />
  );
}
