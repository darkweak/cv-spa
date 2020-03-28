<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ConferenceRepository;
use App\Traits\CityTrait;
use App\Traits\DateTrait;
use App\Traits\IdTrait;
use App\Traits\ImageTrait;
use App\Traits\LinkTrait;
use App\Traits\NameTrait;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     	attributes={"order"={"date": "DESC"}},
 *     	collectionOperations={
 *     		"get"={
 *     			"normaliation_context"={"groups"={"conference_list"}}
 * 			},
 *     		"post"={
 *     			"security"={"is_granted('ROLE_ADMIN')"}
 * 			}
 *	 	},
 *     	itemOperations={
 *     		"get"={
 *     			"normaliation_context"={"groups"={"conference_list"}}
 * 			},
 *     		"patch"={
 *     			"security"={"is_granted('ROLE_ADMIN')"},
 *     			"normaliation_context"={"groups"={"conference_list"}}
 * 			},
 *     		"delete"={
 *     			"security"={"is_granted('ROLE_ADMIN')"},
 *     			"normaliation_context"={"groups"={"conference_list"}}
 * 			}
 *	 	}
 * )
 * @ORM\Entity(repositoryClass=ConferenceRepository::class)
 */
class Conference
{
	use IdTrait;
	use DateTrait;
	use ImageTrait;
	use LinkTrait;
	use NameTrait;
	use CityTrait;

	/**
	 * @ORM\Column(type="text")
	 * @Assert\NotBlank
	 */
	private $abstract;

	/**
	 * @ORM\Column
	 * @Assert\NotBlank
	 */
	private $street;

	public function getStreet(): string
	{
		return $this->street;
	}

	public function setStreet(string $street): self
	{
		$this->street = $street;
		return $this;
	}

	public function getAbstract(): string
	{
		return $this->abstract;
	}

	public function setAbstract(string $abstract): self
	{
		$this->abstract = $abstract;
		return $this;
	}
}
