<?php

namespace App\Entity;
use ApiPlatform\Core\OpenApi\Factory\OpenApiFactoryInterface;
use ApiPlatform\Core\OpenApi\OpenApi;
use ApiPlatform\Core\OpenApi\Model;
use App\Repository\MatieresRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
#[ApiResource(

    collectionOperations: [
       'get',
        'post',
    ],
    itemOperations: [
        'get',
        'put',
        'delete',
       'patch',
       'get_nomMatiere' => [ 'route_name' => 'nom_get_Matiere',
        'openapi_context' => [
          "parameters" => [
          "id" => [
          "name" => "id",
          "in" => "path",
          "required" => false,
          ],               
          "nomMatiere"=> [
          "name" => "nomMatiere",
          "in" => "path",
          "description" => "The nomMatiere of your Matiere",
          "type" => "string",
          "required" => true,
    ],
   ],
 ],
],
],
)]



#[ORM\Entity(repositoryClass: MatieresRepository::class)]
class Matieres
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomMatiere;

    #[ORM\Column(type: 'text')]
    private $descriptionMatiere;

    #[ORM\ManyToOne(targetEntity: Niveau::class, inversedBy: 'matieres')]
    private $niveau;

    #[ORM\Column(type: 'boolean')]
    private $etatMatiere;

    #[ORM\Column(type: 'string', length: 255)]
    private $imageMatiere;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nomMatiere;
    }

    public function setNomMatiere(string $nomMatiere): self
    {
        $this->nomMatiere = $nomMatiere;

        return $this;
    }

    public function getDescriptionMatiere(): ?string
    {
        return $this->descriptionMatiere;
    }

    public function setDescriptionMatiere(string $descriptionMatiere): self
    {
        $this->descriptionMatiere = $descriptionMatiere;

        return $this;
    }

    public function getIdNiveau(): ?Niveau
    {
        return $this->niveau;
    }

    public function setIdNiveau(?Niveau $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function isEtatMatiere(): ?bool
    {
        return $this->etatMatiere;
    }

    public function setEtatMatiere(bool $etatMatiere): self
    {
        $this->etatMatiere = $etatMatiere;

        return $this;
    }

    public function getImageMatiere(): ?string
    {
        return $this->imageMatiere;
    }

    public function setImageMatiere(string $imageMatiere): self
    {
        $this->imageMatiere = $imageMatiere;

        return $this;
    }
}
