<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Users;

class SignUpController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;
    public function __construct(
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $passwordHasher,
    ) {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }

    public function __invoke(Request $request): Response
    {
        $requestContent = json_decode($request->getContent(), true);

        if (
            !array_key_exists('email', $requestContent) ||
            !array_key_exists(
                'password',
                $requestContent
            )
        ) {

            $message = 'Un problème technique est survenu, veuillez réessayer ultérieurement';

            return new Response($message, 500);
        }
        $userEmail = $requestContent['email'];
        $userPassword = $requestContent['password'];
        $userFirstname = $requestContent['firstname'];
        $userLastname = $requestContent['lastname'];
        $userRepository = $this->entityManager->getRepository(Users::class);
        $registeredUser = $userRepository->findOneBy(['email' => $userEmail]);

        if ($registeredUser) {
            return new Response('Adresse email déjà enregistrée', 409);
        }

        $newUser = new Users();
        $newUser
            ->setEmail($userEmail)
            ->setPassword(
                $this->passwordHasher->hashPassword($newUser, $userPassword)
            )
            ->setFirstname($userFirstname)
            ->setLastname($userLastname)
            ->setRoles()
            ->setCreatedAt();
        $this->entityManager->persist($newUser);
        $this->entityManager->flush();
        return new Response('OK', 200);
    }
}
