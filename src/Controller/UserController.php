<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController extends AbstractController
{
    /** Muestra un página donde se renderiza el formulario para la entidad User
     * @param Request $request
     * @param ValidatorInterface $validator
     * @return Response
     */
    #[Route('/user/new', name: 'app_user_new')]
    public function newUser(Request $request, ValidatorInterface $validator): Response
    {
        $user = new User();

        //Creando el formulario
        $form = $this->createForm(UserType::class, $user);

        //Se cargan en el formulario los datos provenientes de la petición
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // Save
            //... aquí iría el códico para persistir el $user

            return new Response("Usuario creado");
        }

        //Renderizando la plantilla
        return $this->render('user/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
