<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: BankRepository::class)]
#[ORM\Table(name: 't_banks')]
class Bank
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer', name: 'b_id', options: ['unsigned' => true])]
    #[Groups(['bank_read', 'bank_write'])]
    private $id;

    #[ORM\Column(type: 'string', length: 100, name: 'b_name')]
    #[Groups(['bank_read', 'bank_write'])]
    private $name;

    #[ORM\Column(type: 'string', length: 100, name: 'b_branch')]
    #[Groups(['bank_read', 'bank_write'])]
    private $branch;

    #[ORM\Column(type: 'string', length: 50, name: 'b_routing_number')]
    #[Groups(['bank_read', 'bank_write'])]
    private $routingNumber;

    #[ORM\Column(type: 'string', length: 20, name: 'b_short_code')]
    #[Groups(['bank_read', 'bank_write'])]
    private $shortCode;

    #[ORM\Column(type: 'boolean', name: 'b_active')]
    #[Groups(['bank_read', 'bank_write'])]
    private $active;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getBranch(): ?string
    {
        return $this->branch;
    }

    public function setBranch(string $branch): self
    {
        $this->branch = $branch;
        return $this;
    }

    public function getRoutingNumber(): ?string
    {
        return $this->routingNumber;
    }

    public function setRoutingNumber(string $routingNumber): self
    {
        $this->routingNumber = $routingNumber;
        return $this;
    }

    public function getShortCode(): ?string
    {
        return $this->shortCode;
    }

    public function setShortCode(string $shortCode): self
    {
        $this->shortCode = $shortCode;
        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;
        return $this;
    }
}
