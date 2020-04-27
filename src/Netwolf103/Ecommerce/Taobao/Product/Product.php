<?php
namespace Netwolf103\Ecommerce\Taobao\Product;

use Netwolf103\Ecommerce\Taobao\Product\Images;
use Netwolf103\Ecommerce\Taobao\Product\Attribute;

/**
 * Product object
 *
 * @author Zhang Zhao <netwolf103@gmail.com>
 */
class Product
{
	/**
	 * Product name
	 *
	 * @var string
	 */
	private $name;

	/**
	 * Product url
	 *
	 * @var string
	 */
	private $url;

	/**
	 * Product sku
	 *
	 * @var string
	 */
	private $sku;

	/**
	 * Product price
	 *
	 * @var float
	 */
	private $price;

	/**
	 * Price currency
	 *
	 * @var string
	 */
	private $currency;

	/**
	 * Product description
	 *
	 * @var string
	 */
	private $desc;

	/**
	 * Product images object
	 *
	 * @var Images
	 */
	private $images;

	/**
	 * Product attribute
	 *
	 * @var Attribute
	 */
	private $attribute;

	/**
	 * Initialize product.
	 *
	 * @param Images $images
	 */
	public function __construct(Images $images, Attribute $attribute)
	{
		$this->images 	 = $images;
		$this->attribute = $attribute;
	}

	/**
	 * Return header
	 *
	 * @return array
	 */
	public function getHeader(): array
	{
		$header = ['Name', 'Sku', 'Url', 'Price', 'Desc'];

		if ($this->images) {
			$header = array_merge($header, $this->images->getHeader());
		}

		if ($this->attribute) {
			$header = array_merge($header, $this->attribute->getHeader());
		}

		return $header;
	}

	/**
	 * Return data
	 *
	 * @return array
	 */
	public function getData(): array
	{
		$data = [$this->name, $this->sku, $this->url, sprintf('%s %.2f', $this->currency, $this->price), $this->desc];

		if ($this->images) {
			$data = array_merge($data, $this->images->getUrls());
		}

		if ($this->attribute) {
			$data = array_merge($data, $this->attribute->getData());
		}

		return $data;
	}

	/**
	 * Return name
	 *
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * Set name
	 *
	 * @param string $name
	 * @return self
	 */
	public function setName(string $name): self
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Return url
	 *
	 * @return string
	 */
	public function getUrl(): string
	{
		return $this->string;
	}

	/**
	 * Set url
	 *
	 * @param string $url
	 * @return self
	 */
	public function setUrl(string $url): self
	{
		$this->url = $url;

		return $this;
	}

	/**
	 * Return sku
	 *
	 * @return string
	 */
	public function getSku(): string
	{
		return $this->sku;
	}

	/**
	 * Set sku
	 *
	 * @param string $sku
	 * @return self
	 */
	public function setSku(string $sku): self
	{
		$this->sku = $sku;

		return $this;
	}

	/**
	 * Return price
	 *
	 * @return float
	 */
	public function getPrice(): float
	{
		return $this->price;
	}

	/**
	 * Set price
	 *
	 * @param float $price
	 * @return self
	 */
	public function setPrice(float $price): self
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Return currency
	 *
	 * @return string
	 */
	public function getCurrency(): string
	{
		return $this->currency;
	}

	/**
	 * Set currency
	 *
	 * @param string $currency
	 * @return self
	 */
	public function setCurrency(string $currency): self
	{
		$this->currency = $currency;

		return $this;
	}

	/**
	 * Return description
	 *
	 * @return string
	 */
	public function getDesc(): string
	{
		return $this->desc;
	}

	/**
	 * Set description
	 *
	 * @param string $desc
	 * @return self
	 */
	public function setDesc(string $desc): self
	{
		$this->desc = $desc;
		
		return $this;
	}

	/**
	 * Return images
	 *
	 * @return Images
	 */
	public function getImages(): Images
	{
		return $this->images;
	}

	/**
	 * Set images
	 *
	 * @param Images $images
	 * @return self
	 */
	public function setImages(Images $images): self
	{
		$this->images = $images;

		return $this;
	}

	/**
	 * Return attribute
	 *
	 * @return Attribute
	 */
	public function getAttribute(): Attribute
	{
		return $this->attribute;
	}

	/**
	 * Set attribute
	 *
	 * @param Attribute $attribute
	 * @return self
	 */
	public function setAttribute(Attribute $attribute): self
	{
		$this->attribute = $attribute;

		return $this;
	}
}