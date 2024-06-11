"use server";

export default async function UserProfil({ id }) {
  const res = await fetch(`https://127.0.0.1:8000/api/userss/${id}`, {
    method: "GET",
    headers: {
      "Content-Type": "application/ld+json",
    },
  });
  const data = await res.json();

  if (!res.ok) {
    throw new Error("Failed to fetch data");
  }
  return (
    <>
      <div className="profil-container">
        <h1>Profil</h1>
        <p>Firstname : {data.firstname}</p>
        <p>Lastname : {data.lastname}</p>
        <p>Email : {data.email}</p>
      </div>
    </>
  );
}
