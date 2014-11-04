<?php header('Content-type: application/xml'); ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    <url>
        <loc>http://www.vegansearch.co.il/</loc>
    </url>

    <url>
        <loc>http://www.vegansearch.co.il/guide</loc>
    </url>

    <url>
        <loc>http://www.vegansearch.co.il/contact</loc>
    </url>

    <url>
        <loc>http://www.vegansearch.co.il/terms</loc>
    </url>

    <url>
        <loc>http://www.vegansearch.co.il/search</loc>
    </url>

    <?php foreach ($products as $product): ?>
        <url>
            <loc>http://www.vegansearch.co.il/product/<?php echo $product['url']; ?></loc>
        </url>
    <?php endforeach; ?>

    <?php foreach ($ingredients as $ingredient): ?>
        <url>
            <loc>http://www.vegansearch.co.il/ingredient/<?php echo $ingredient['url']; ?></loc>
        </url>
    <?php endforeach; ?>

</urlset>