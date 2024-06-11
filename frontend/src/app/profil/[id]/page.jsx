"use client";
import UserProfil from "@/components/User/Profil/Profil";
import Button from "@/components/button/Button";
import { useState } from "react";

export default function Profil({ params }) {
  return (
    <>
    <div className="menu-container">
        <Button onClick="">Profil</Button>
        <Button onClick="">Fines paid</Button>
      </div>
      <UserProfil id={params.id} />
    </>
  );
}
