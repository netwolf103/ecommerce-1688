# netwolf103/ecommerce-taobao
1688 product data parser.

# Code maintainers
![头像](https://avatars3.githubusercontent.com/u/1772352?s=100&v=4)
------------
Zhang Zhao <netwolf103@gmail.com>
------------
Wechat: netwolf103

## Require
	"php": "^7.0"

## Install
composer require netwolf103/ecommerce-taobao

## Usage
```PHP
require_once './vendor/autoload.php';

use Netwolf103\Ecommerce\Taobao\Collection;
use Netwolf103\Ecommerce\Taobao\Product\Product;
use Netwolf103\Ecommerce\Taobao\Product\Images;
use Netwolf103\Ecommerce\Taobao\Product\Attribute;

$varDir = sprintf('%s/var', dirname(__FILE__));
$productHtml = 'demo.html';

$collection = new Collection($productHtml, new Product(new Images, new Attribute));
$collection
	->parse()
	->saveCsv(sprintf('%s/1688/%s.csv', $varDir, $collection->getProduct()->getSku()))
;
```