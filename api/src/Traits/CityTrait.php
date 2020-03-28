<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

trait CityTrait
{
	/**
	 * @ORM\Column
	 * @Assert\NotBlank
	 */
	private $city;

	/**
	 * @ORM\Column
	 * @Assert\NotBlank
	 */
	private $cp;

	public function getCity(): string
	{
		return $this->city;
	}

	public function setCity(string $city): self
	{
		$this->city = $city;
		return $this;
	}

	public function getCp(): string
	{
		return $this->cp;
	}

	public function setCp(string $cp): self
	{
		$this->cp = $cp;
		return $this;
	}
}