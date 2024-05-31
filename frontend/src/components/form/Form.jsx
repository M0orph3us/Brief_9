"use client";
export default function Form({ action, method, onSubmit, children }) {
  const handleSubmit = (e) => {
    e.preventDefault();
    onSubmit(e);
  };
  return (
    <form
      action={action}
      method={method}
      onSubmit={() => {
        handleSubmit;
      }}
    >
      {children}
    </form>
  );
}
