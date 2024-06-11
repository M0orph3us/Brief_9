"use server";
import Button from "@/components/button/Button";
import Form from "@/components/form/Form";
import Input from "@/components/form/Input";
import Label from "@/components/form/Label";
import { payement } from "@/app/lib/actions";

export default async function Payment() {
  return (
    <>
      <Form action={payement}>
        <div>
          <Label htmlFor={"lastname-payment"}>Lastname : </Label>
          <Input id={"lastname-payment"} name={"lastname"} type={"text"} />
        </div>
        <div>
          <Label htmlFor={"firstname-payment"}>Firstname : </Label>
          <Input id={"firstname-payment"} name={"firstname"} type={"text"} />
        </div>
        <div>
          <Label htmlFor={"address-payment"}>Adress : </Label>
          <Input id={"address-payment"} name={"address"} type={"text"} />
        </div>
        <div>
          <Label htmlFor={"tel-payment"}>Phone number : </Label>
          <Input id={"tel-payment"} name={"tel"} type={"tel"} />
        </div>
        <div>
          <Label htmlFor={"email-payment"}>Email : </Label>
          <Input id={"email-payment"} name={"email"} type={"email"} />
        </div>
        <div>
          <Label htmlFor={"credit-card"}>Credit card : </Label>
          <Input id={"credit-card"} name={"credit-card"} type={"number"} />
        </div>
        <div>
          <Label htmlFor={"cryptogram"}>Cryprogram : </Label>
          <Input id={"cryptogram"} name={"cryptogram"} type={"number"} />
        </div>
        <div>
          <Label htmlFor={"expiration-date"}>Expiration date : </Label>
          <Input
            id={"expiration-date"}
            name={"expiration-date"}
            type={"date"}
          />
        </div>
        <Button type={"submit"}>Pay</Button>
      </Form>
    </>
  );
}
