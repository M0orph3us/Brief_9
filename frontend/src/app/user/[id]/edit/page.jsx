"use server";
import Link from "next/link";
import Button from "@/components/button/Button";
import Form from "@/components/form/Form";
import Input from "@/components/form/Input";
import Label from "@/components/form/Label";
import { edit } from "@/app/lib/actions";

export default async function Edit({ params }) {
  const id = params.id;
  return (
    <>
      <Form action={edit}>
        <div>
          <Label htmlFor={"email-edit"}>Email : </Label>
          <Input id={"email-edit"} name={"email"} type={"email"} />
        </div>
        <div>
          <Label htmlFor={"firstname-edit"}>Firstname : </Label>
          <Input id={"firstname-edit"} name={"firstname"} type={"text"} />
        </div>
        <div>
          <Label htmlFor={"lastname-edit"}>Lastname : </Label>
          <Input id={"lastname-edit"} name={"lastname"} type={"text"} />
        </div>
        <Input value={id} name={"id"} type={"hidden"} />
        <Button type={"submit"}>Edit</Button>
      </Form>
      <Link href={`/user/${id}/profil`}>Back to profil</Link>
    </>
  );
}
