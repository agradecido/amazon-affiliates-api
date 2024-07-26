<?php
require __DIR__ . '/src/vendor/autoload.php';

use Amz\AmazonProductSearch;
use Amz\AmazonDataParser;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$keyword = getenv('PRODUCT_KEYWORD') ?: ($_ENV['PRODUCT_KEYWORD'] ?? null);
$search = new AmazonProductSearch($keyword);
$data = $search->searchItems();
$parser = new AmazonDataParser($data);
$products = $parser->parse();

function generateDescription($title, $price) {
    // return "Descubre el increíble $title por solo $price. Este producto ofrece una calidad y características excepcionales que no te puedes perder. ¡Haz clic en 'Buy Now' para obtener el tuyo hoy mismo!";
    return '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/styles/styles.min.css" rel="stylesheet">
    <title>Capitan Cobarde Amazon Store</title>
</head>

<body class="bg-gray-100 text-gray-800">
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Discos de Capitan Cobarde y Albertucho</h1>
            <nav>
                <a href="#" class="text-white mx-2">Inicio</a>
                <!--<a href="#" class="text-white mx-2">Products</a>-->
                <a href="mailto:info@capitancobarde.com" class="text-white mx-2">Contacto</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto py-8 px-4">
        <section class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Bienvenidos a la Tienda de Discos de Albertucho y El Capitán Cobarde</h2>
            <p class="mb-4">
                Entra en la tienda de discos de <strong>Albertucho</strong> y <strong>El Capitán Cobarde</strong>, donde la magia del rock andaluz cobra vida en cada rincón. Este espacio, dedicado a los fanáticos de la buena música, te ofrece una experiencia única y personalizada, donde puedes encontrar desde los clásicos que marcaron una época hasta las más recientes creaciones de estos icónicos artistas. Con una atención especial a los detalles y un ambiente que evoca las raíces de su música, la tienda promete ser un refugio para los amantes del rock auténtico.
            </p>
            <p class="mb-4">
                <strong>Albertucho</strong>, con su voz potente y letras profundas, nos transporta a un mundo de poesía y rebeldía. Sus discos, que han resonado en corazones de todas las edades, están cuidadosamente seleccionados y expuestos para que cada visitante pueda disfrutar de su evolución musical. Desde <a href="https://www.amazon.es/dp/B000HOLLXY?tag=mdvrock-21&linkCode=osi&th=1&psc=1" class="text-accent">"Lunas de Mala Lengua"</a> hasta <a href="https://www.amazon.es/dp/B0CLDLH82D?tag=mdvrock-21&linkCode=osi&th=1&psc=1" class="text-accent">"El Regreso del Perro Andaluz"</a>, cada álbum es un viaje por las vivencias y la evolución de un artista que nunca deja de sorprendernos.
            </p>
        </section>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach ($products as $product) : ?>
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="aspect-w-1 aspect-h-1">
                        <img class="w-full h-full object-cover" src="<?php echo $product['Image']; ?>" alt="<?php echo $product['Title']; ?>">
                    </div>
                    <div class="p-4">
                        <h2 class="text-lg font-bold"><?php echo $product['Title']; ?></h2>
                        <p class="text-gray-600"><?php echo $product['Price']; ?></p>
                        <a href="<?php echo $product['URL']; ?>" class="mt-2 block text-center bg-blue-500 text-white py-2 rounded">Buy Now</a>
                        <p class="text-gray-700"><?php echo generateDescription($product['Title'], $product['Price']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <section class="mt-8">
            <p class="mb-4">
                Por otro lado, <strong>El Capitán Cobarde</strong>, la faceta más folk de Alberto Romero, ofrece una colección que refleja su transición y madurez artística. Con discos que mezclan la tradición con la modernidad, este alter ego nos presenta una propuesta fresca y sincera. Sus obras, llenas de matices y ritmos, están disponibles en versiones físicas y exclusivas, convirtiendo cada compra en un tesoro para cualquier coleccionista.
            </p>
            <p class="mb-4">
                No pierdas la oportunidad de sumergirte en el universo musical de <strong>Albertucho</strong> y <strong>El Capitán Cobarde</strong>. Visita nuestra tienda y descubre la pasión, el talento y la autenticidad que estos dos grandes del rock andaluz tienen para ofrecer. Ya seas un seguidor de antaño o un nuevo aficionado, encontrarás algo que te conectará aún más con su música y su arte. ¡Te esperamos con los brazos abiertos y los mejores discos para que vivas una experiencia inolvidable!
            </p>
        </section>        
    </main>

    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2024. Amazon Affiliates Experiment.</p>
            <p>Puedes comprar tus discos sin miedo, esto es un experimiento de tienda autogenerada con enlaces a Amazon donde se encuentran los productos.</p>
        </div>
    </footer>

</body>

</html>