"use server";
import Form from "@/components/form/Form";
import Label from "@/components/form/Label";
import { getFine } from "@/app/lib/actions";
import Input from "@/components/form/Input";
import Button from "@/components/button/Button";

export default async function GetFine() {
  return (
    <Form action={getFine}>
      <div>
        <Label htmlFor={"id_numbers"}>ID Fine : </Label>
        <Input id={"id_numbers"} name={"id_numbers"} type={"text"} />
      </div>
      <Button type={"submit"}>Get my fine</Button>
    </Form>
  );
}
