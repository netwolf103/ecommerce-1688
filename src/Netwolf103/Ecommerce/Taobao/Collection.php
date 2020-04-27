<?php
namespace Netwolf103\Ecommerce\Taobao;

use Netwolf103\Ecommerce\Taobao\Product\Product;

/**
 * Collection product html data.
 *
 * @author Zhang Zhao <netwolf103@gmail.com>
 */
class Collection
{
	/**
	 * Product object
	 *
	 * @var Netwolf103\Product\Product
	 */
	private $product;

	/**
	 * Product html
	 *
	 * @var string
	 */
	private $html;

	/**
	 * Initialize html & product.
	 *
	 * @param string       $file
	 * @param Product      $product
	 */
	public function __construct(string $file, Product $product)
	{
		$this->html 	= file_get_contents($file);
		$this->product 	= $product;
	}

	/**
	 * Product parse
	 *
	 * @return self
	 */
	public function parse(): self
	{
		$html = str_replace(["\r", "\n", "\r\n"], '', $this->html);
		$html = preg_replace('/\>\s+\</U', '><', $html);

		preg_match('/<link rel="canonical" href="(.*)">/U', $html, $matches);
		$this->product->setUrl($matches[1] ?? '');

		preg_match('/<meta property="og:title" content="(.*)">/U', $html, $matches);
		$this->product->setName($matches[1] ?? '');

		preg_match('/<meta property="og:product:price" content="(.*)">/U', $html, $matches);
		$this->product->setPrice($matches[1] ?? 0);

		preg_match('/<meta property="og:product:currency" content="(.*)">/U', $html, $matches);
		$this->product->setCurrency($matches[1] ?? 0);

		preg_match_all('/data-imgs="(.*)"/U', $html, $matches);
		$images = $matches[1] ?? [];
		foreach ($images as $image) {
			$image = str_replace('&quot;', '"', $image);
			$image = json_decode($image);
			
			$this->product->getImages()->addUrl($image->original);
		}

		$this->product->setSku($this->generateSku());
		//$this->product->setDesc('产品描述');

		// Attributes
		preg_match('/<b>单位重量<\/b><em>(.*)<\/em>/U', $html, $matches);
		$this->product->getAttribute()->setWeight($matches[1] ?? '');

		preg_match('/<td class="de-feature">材质<\/td><td class="de-value">(.*)<\/td>/U', $html, $matches);
		$this->product->getAttribute()->setMaterial($matches[1] ?? '');

		preg_match('/<td class="de-feature">风格<\/td><td class="de-value">(.*)<\/td>/U', $html, $matches);
		$this->product->getAttribute()->setStyle($matches[1] ?? '');			

		//print_r($this->product);

		return $this;
	}

	/**
	 * Save to csv file
	 *
	 * @param  string $filename
	 * @return self
	 */
	public function saveCsv(string $filename): self
	{
		if (!is_dir(dirname($filename))) {
			mkdir(dirname($filename), 0777, true);
		}

		$fp = fopen($filename, "w");

		fputcsv($fp, $this->product->getHeader());

		$data = array_map(function($item){
			return $item ?: 'NULL';
		}, $this->product->getData());
		fputcsv($fp, $data);

		fclose($fp);

		return $this;
	}

	/**
	 * Generate sku
	 *
	 * @return string
	 */
	public function generateSku(): string
	{
		$date = new \DateTime();
		$sku = $date->format('Ymdu');

		return $sku;
	}

	/**
	 * Return product.
	 *
	 * @return Product
	 */
	public function getProduct(): Product
	{
		return $this->product;
	}

	/**
	 * Set product.
	 *
	 * @param Product $product
	 * @return self
	 */
	public function setProduct(Product $product): self
	{
		$this->product = $product;

		return $this;
	}

	/**
	 * Return html.
	 *
	 * @return string
	 */
	public function getHtml(): string
	{
		return $this->html;
	}

	/**
	 * Set html string.
	 *
	 * @param string $html
	 * @return self
	 */
	public function setHtml(string $html): self
	{
		$this->html = $html;

		return $this;
	}

	/**
	 * Collection to string.
	 *
	 * @return string
	 */
	public function __toString()
	{
		return $this->html;
	}
}