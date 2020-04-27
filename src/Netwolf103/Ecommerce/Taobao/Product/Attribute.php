<?php
namespace Netwolf103\Ecommerce\Taobao\Product;

/**
 * Product attribute object
 *
 * @author Zhang Zhao <netwolf103@gmail.com>
 */
class Attribute
{
	/**
	 * Weight
	 *
	 * @var string
	 */
	private $weight;

	/**
	 * Material
	 *
	 * @var string
	 */
	private $material;

	/**
	 * Style
	 *
	 * @var string
	 */
	private $style;

	/**
	 * Return header
	 *
	 * @return array
	 */
	public function getHeader(): array
	{
		return ['Weight', 'Material', 'Style'];
	}

	/**
	 * Return data
	 *
	 * @return array
	 */
	public function getData(): array
	{
		return [$this->weight, $this->material, $this->style];
	}	

	/**
	 * Return weight
	 *
	 * @return string
	 */
	public function getWeight(): string
	{
		return $this->weight;
	}

	/**
	 * Set weight
	 *
	 * @param string $weight
	 * @return self
	 */
	public function setWeight(string $weight): self
	{
		$this->weight = $weight;

		return $this;
	}

	/**
	 * Return material
	 *
	 * @return string
	 */
	public function getMaterial(): string
	{
		return $this->material;
	}

	/**
	 * Set material
	 *
	 * @param string $material
	 * @return self
	 */
	public function setMaterial(string $material): self
	{
		$this->material = $material;

		return $this;
	}

	/**
	 * Return style
	 *
	 * @return string
	 */
	public function getStyle(): string
	{
		return $this->style;
	}

	/**
	 * Set style
	 *
	 * @param string $style
	 * @return self
	 */
	public function setStyle(string $style): self
	{
		$this->style = $style;

		return $this;
	}	
}