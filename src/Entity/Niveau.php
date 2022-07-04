<?php

namespace App\Entity;

use App\Repository\NiveauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
#[ApiResource]


#[ORM\Entity(repositoryClass: NiveauRepository::class)]
class Niveau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomNiveau;

    #[ORM\OneToMany(mappedBy: 'niveau', targetEntity: Matieres::class)]
    private $matieres;

    public function __construct()
    {
        $this->matieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomNiveau(): ?string
    {
        return $this->nomNiveau;
    }

    public function setNomNiveau(string $nomNiveau): self
    {
        $this->nomNiveau = $nomNiveau;

        return $this;
    }

    /**
     * @return Collection<int, Matieres>
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matieres $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
            $matiere->setIdNiveau($this);
        }

        return $this;
    }

    public function removeMatiere(Matieres $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getIdNiveau() === $this) {
                $matiere->setIdNiveau(null);
            }
        }

        return $this;
    }
}
