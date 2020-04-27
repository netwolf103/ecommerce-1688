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
	public function getData(): array
	{
		$data = [];

		for ($i = 1; $i <= count($this->urls); $i++) {
			$key = sprintf("Image %d", $i);
			$data[$key] = $this->urls[$i-1];
		}

		return $data;
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