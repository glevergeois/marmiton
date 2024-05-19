<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Repository\IngredientRepository;
use App\Repository\RecipeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(RecipeRepository $recipeRepository, IngredientRepository $ingredientRepository, CommentRepository $commentRepository, Request $request): Response
    {
        $currentRoute = $request->attributes->get('_route');

        return $this->render('home/index.html.twig', [
            'recipes' => $recipeRepository->findAll(),
            'ingredients' => $ingredientRepository->findAll(),
            'comments' => $commentRepository->findAll(),
            'currentRoute' => $currentRoute,
        ]);
    }
}
