<?php

namespace App\Entity;

use App\Repository\CaseFolderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaseFolderRepository::class)]
class CaseFolder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private int $test = 1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTest(): ?int
    {
        return $this->test;
    }

    public function setTest(int $test): self
    {
        $this->test = $test;

        return $this;
    }
}
