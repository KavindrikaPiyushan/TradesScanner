<?php
/**
 * Generate a product card component
 * 
 * @param array $product An array containing product information with the following keys:
 *                       - image: path to the product image
 *                       - title: product title/name
 *                       - price: product price (formatted)
 *                       - description: short product description
 *                       - link: link to the product detail page
 * @return string HTML markup for the product card
 */
function renderProductCard($product) {
    // Set default values if not provided
    $image = isset($product['image']) ? $product['image'] : './images/placeholder.jpeg';
    $title = isset($product['title']) ? $product['title'] : 'Product Title';
    $price = isset($product['price']) ? $product['price'] : '0,00 €';
    $description = isset($product['description']) ? $product['description'] : 'No description available...';
    $link = isset($product['link']) ? $product['link'] : '#';
    
    // Generate the product card HTML
    $html = <<<HTML
    <div class="product-card">
        <img src="{$image}" alt="{$title}" class="card-img">
        <div class="crd-description">
            <h6>{$title}</h6>
            <h5>{$price}</h5>
            <p class="product-details">{$description}</p>
            <a href="{$link}" class="read-more">
                <p>Read More</p>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="#2B76DD" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="read-more-next">
                    <path d="M9 6l6 6-6 6" />
                </svg>
            </a>
        </div>
    </div>
HTML;

    return $html;
}

/**
 * Generate a product carousel with multiple product cards
 * 
 * @param array $products Array of product data arrays
 * @param string $title Carousel title
 * @param string $viewAllLink Link for "View All Products" button
 * @return string HTML markup for the product carousel
 */
function renderProductCarousel($products, $title = 'Related Products', $viewAllLink = '#') {
    // Start building the HTML
    $html = <<<HTML
    <div class="related-products-section">
        <div class="title-section">
            <h2 class="related-products-title">{$title}</h2>
            <div class="all-products-btn view-all-products">
                <a href="{$viewAllLink}">View All Products</a>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 6l6 6-6 6" />
                </svg>
            </div>
        </div>
        <div class="related-products-cover">
HTML;

    // Add product cards
    foreach ($products as $product) {
        $html .= renderProductCard($product);
    }

    // Close the products container and add navigation arrows
    $html .= <<<HTML
        </div>
    </div>
HTML;

    return $html;
}
?>