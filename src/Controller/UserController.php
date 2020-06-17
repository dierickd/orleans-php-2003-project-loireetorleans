<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/trombinoscope", name="user_index")
     * @return Response
     */
    public function index(): Response
    {
        $users = $this->getDoctrine()
            ->getRepository(User::class)
            ->findAll();

        return $this->render('trombinoscope/index.html.twig', [
            'users' => $users,
        ]);
    }

    /**
     * @Route("/{login}", name="user_show")
     */
    public function show($login): Response
    {
        $user = $this->getDoctrine()
            ->getRepository(User::class)
            ->findOneBy(['login' => $login]);

        return $this->render('ambassador/show.html.twig', [
            'user' => $user,
        ]);
    }
}