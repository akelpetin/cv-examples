<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

/**
 * Class Company
 *
 * @Entity(repositoryClass="App\Repository\CompanyRepository")
 * @Table(name="company")
 *
 * @package App\Entity
 */
class Company
{
    /**
     * @var int
     *
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    private int $id;

    /**
     * @var string
     *
     * @Column(type="string")
     */
    private string $name;

    /**
     * @var ArrayCollection
     *
     * @OneToMany(targetEntity="User", mappedBy="company")
     */
    private Collection $users;

    /**
     * Company constructor.
     */
    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getUsers(): ArrayCollection
    {
        return $this->users;
    }
}