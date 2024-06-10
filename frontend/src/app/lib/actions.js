"use server";
import { cookies } from "next/headers";
import { redirect } from "next/navigation";
export async function authenticate(formData) {
  const email = formData.get("email");
  const password = formData.get("password");
  const res = await fetch("https://127.0.0.1:8000/api/login_check", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ username: email, password: password }),
  });
  const data = await res.json();
  if (res.ok) {
    cookies().set("token", data.token);
    redirect(`/profil/${data.id}`);
  } else {
    redirect("/");
  }
}

export async function register(formData) {
  const email = formData.get("email");
  const password = formData.get("password");
  const firstname = formData.get("firstname");
  const lastname = formData.get("lastname");

  const res = await fetch("https://127.0.0.1:8000/api/userss", {
    method: "POST",
    headers: {
      "Content-Type": "application/ld+json",
    },
    body: JSON.stringify({
      email: email,
      password: password,
      firstname: firstname,
      lastname: lastname,
    }),
  });
  const data = await res.json();
  if (res.ok) {
    redirect("/");
  }
}

export async function getFine(formData) {
  const idNumbers = formData.get("id_numbers");

  const res = await fetch("https://127.0.0.1:8000/getFine", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      id_numbers: idNumbers,
    }),
  });
  const data = await res.json();
  return {
    ok: res.ok,
    status: res.status,
    data: data,
  };
}

export async function payement(formData) {
  const idNumbers = formData.get("id_numbers");

  const res = await fetch("https://127.0.0.1:8000/getFine", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      id_numbers: idNumbers,
    }),
  });
  const data = await res.json();
  return {
    ok: res.ok,
    status: res.status,
    data: data,
  };
}
