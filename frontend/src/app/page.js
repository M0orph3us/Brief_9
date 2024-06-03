import Button from "@/components/button/Button";
import Form from "@/components/form/Form";
import Input from "@/components/form/Input";
import Label from "@/components/form/Label";
import { Login } from "@/server/actions";

export default function Home() {
  return (
    <>
      <h1>Home</h1>
      <Form action={Login}>
        <div>
          <Label htmlFor={"email-login"}>Email : </Label>
          <Input id={"email-login"} name={"username"} type={"email"} />
        </div>
        <div>
          <Label htmlFor={"password-login"}>Password : </Label>
          <Input id={"password-login"} name={"password"} type={"password"} />
        </div>
        <Button type={"submit"}>Login</Button>
      </Form>
    </>
  );
}
