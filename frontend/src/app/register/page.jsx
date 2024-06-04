import Button from "@/components/button/Button";
import Form from "@/components/form/Form";
import Input from "@/components/form/Input";
import Label from "@/components/form/Label";
import { register } from "../lib/actions";

export default function Register() {
  return (
    <>
      <h1>Hello</h1>
      <Form action={register}>
        <div>
          <Label htmlFor={"email-register"}>Email : </Label>
          <Input id={"email-register"} name={"email"} type={"email"} />
        </div>
        <div>
          <Label htmlFor={"firstname-register"}>Firstname : </Label>
          <Input id={"firstname-register"} name={"firstname"} type={"text"} />
        </div>
        <div>
          <Label htmlFor={"lastname-register"}>Lastname : </Label>
          <Input id={"lastname-register"} name={"lastname"} type={"text"} />
        </div>
        <div>
          <Label htmlFor={"password-register"}>Password : </Label>
          <Input id={"password-register"} name={"password"} type={"password"} />
        </div>
        <Button type={"submit"}>Register</Button>
      </Form>
    </>
  );
}
