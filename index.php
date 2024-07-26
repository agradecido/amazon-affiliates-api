<?php
require __DIR__ . '/src/vendor/autoload.php';

use Amz\AmazonProductSearch;
use Amz\AmazonDataParser;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$search = new AmazonProductSearch('albertucho');
$data = $search->searchItems();
$parser = new AmazonDataParser($data);
$products = $parser->parse();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/styles/styles.min.css" rel="stylesheet">
    <title>Amazon Affiliate Store</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Amazon Affiliate Store</h1>
        <div id="products" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <?php
            foreach ($products as $product) {
                echo '<div class="bg-white p-4 rounded shadow">';
                echo '<img src="' . $product['Image'] . '" alt="' . $product['Title'] . '" class="w-full h-48 object-cover mb-4">';
                echo '<h2 class="text-lg font-bold">' . $product['Title'] . '</h2>';
                echo '<p class="text-gray-600 text-sm mb-4">' . $product['Price'] . '</p>';
                echo '<a href="' . $product['URL'] . '" class="bg-blue-500 text-white py-2 px-4 rounded inline-block">View on Amazon</a>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
