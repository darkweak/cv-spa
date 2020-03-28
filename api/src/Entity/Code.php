<?php

namespace App\Entity;

use App\Traits\IdTrait;
use App\Traits\NameTrait;
use App\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Code
{
	use IdTrait;
	use NameTrait;
	use TranslatableTrait;

	/**
	 * @ORM\ManyToOne(targetEntity=CodePackage::class, inversedBy="codes")
	 */
	private $codePackage;

	public function getCodePackage(): CodePackage
	{
		return $this->codePackage;
	}

	public function setCodePackage(CodePackage $codePackage): self
	{
		$this->codePackage = $codePackage;
		return $this;
	}
}
