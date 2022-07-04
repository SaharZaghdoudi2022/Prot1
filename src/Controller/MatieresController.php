<?php

namespace App\Controller;




use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[AsController]
class MatieresController extends AbstractController
{

#[Route(
        name: 'nom_get_Matiere',
        path: 'Matieres/{nomMatiere}',
        methods: ['Get'],
        defaults: [
            '_api_resource_class'=> Matieres::class,
            '_api_item_operation_name' => 'get_nomMatiere',
        ],
    )]
  
   public function __invoke(string $nomMatiere)
    {
        $Matieres = $this->getDoctrine()
            ->getRepository(Matiere::class)
            ->findByNomMatiere($nomMatiere);

        return $Matieres;
    }

}
