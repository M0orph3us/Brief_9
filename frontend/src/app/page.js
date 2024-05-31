import Button from "@/components/button/Button";
import Form from "@/components/form/Form";
import Input from "@/components/form/Input";
import Label from "@/components/form/Label";

export default function Home() {
  return (
    <>
      <h1>Home</h1>
      <Form action={"/"} method={"POST"}>
        <div>
          <Label htmlFor={"email-login"}>Email : </Label>
          <Input id={"email-login"} type={"email"} />
        </div>
        <div>
          <Label htmlFor={"password-login"}>Password : </Label>
          <Input id={"password-login"} type={"password"} />
        </div>
        <Button type={"submit"}>Login</Button>
      </Form>
    </>
  );
}
