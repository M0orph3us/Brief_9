import Button from "@/components/button/Button";
import Form from "@/components/form/Form";
import Input from "@/components/form/Input";
import Label from "@/components/form/Label";
import { authenticate } from "../lib/actions";

export default function Login() {
  return (
    <Form action={authenticate}>
      <div>
        <Label htmlFor={"email-login"}>Email : </Label>
        <Input id={"email-login"} name={"email"} type={"email"} />
      </div>
      <div>
        <Label htmlFor={"password-login"}>Password : </Label>
        <Input id={"password-login"} name={"password"} type={"password"} />
      </div>
      <Button type={"submit"}>Login</Button>
    </Form>
  );
}
