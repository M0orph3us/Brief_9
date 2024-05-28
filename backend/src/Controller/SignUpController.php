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
        // Décode la requête.
        $requestContent = json_decode($request->getContent(), true);
        // Si les clés "email" et "password" ne sont pas présentent dans la
        // requête renvoie une erreur.
        if (
            !array_key_exists('email', $requestContent) ||
            !array_key_exists(
                'password',
                $requestContent
            )
        ) {

            $message = 'Un problème technique est survenu, veuillez réessayer ultérieu';

            return new Response($message, 500);
        }
        $userEmail = $requestContent['email'];
        $userPassword = $requestContent['password'];
        $userRepository = $this->entityManager->getRepository(Users::class);
        $registeredUser = $userRepository->findOneBy(['email' => $userEmail]);
        // Si l'utilisateur est déjà enregistré renvoie une erreur.
        if ($registeredUser) {
            return new Response('Adresse email déjà enregistrée', 409);
        }
        // Hash le mot de passe de l'utilisateur et l'enregistre.
        $newUser = new Users();
        $newUser->setEmail($userEmail);
        $newUser->setPassword(
            $this->passwordHasher->hashPassword($newUser, $userPassword)
        );
        $this->entityManager->persist($newUser);
        $this->entityManager->flush();
        return new Response('OK', 200);
    }
}
