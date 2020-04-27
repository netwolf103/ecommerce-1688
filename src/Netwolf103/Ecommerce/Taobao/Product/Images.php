<?php
namespace Netwolf103\Ecommerce\Taobao\Product;

/**
 * Product images object
 *
 * @author Zhang Zhao <netwolf103@gmail.com>
 */
class Images
{
	/**
	 * Product urls
	 *
	 * @var array
	 */
	private $urls;

	/**
	 * Return header
	 *
	 * @return array
	 */
	public function getHeader(): array
	{
		$header = [];

		for ($i = 1; $i <= count($this->urls); $i++) { 
			$header[] = sprintf("Image %d", $i);
		}

		return $header;
	}

	/**
	 * Return urls
	 *
	 * @return array
	 */
	public function getUrls(): array
	{
		return $this->urls;
	}

	/**
	 * Set urls
	 *
	 * @param array $urls
	 * @return self
	 */
	public function setUrls(array $urls): self
	{
		$this->urls = $urls;

		return $this;
	}

	/**
	 * Add a url
	 *
	 * @param string $url
	 * @return self
	 */
	public function addUrl(string $url): self
	{
		$this->urls[] = $url;

		return $this;
	}
}