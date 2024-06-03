"use server";
export async function Login(formData) {
  const username = formData.get("username").value;
  const password = formData.get("password").value;
  const res = await fetch("https://127.0.0.1:8000/api/login_check", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ username: username, password: password }),
  });

  const data = await res.json();
  console.log(data);

  return Response.json(data);
}
