<?php include 'inc.header.php'; ?>

<!-- Hero Section -->
<section class="hero-image">
    <div class="hero-text">
        <h1>Tradesscanner</h1>
        <h5>BLOG & INSIGHTS</h5>
    </div>
</section>

<!-- Introduction Section -->
<section class="blog-second-section">
    <div class="container">
        <div class="row">
            <h5>YOUR EDGE IN THE MARKET</h5>
            <h2>Explore our latest articles, tips, and updates</h2>
            <p>Discover Expert Insights, Industry Trends, and Helpful Guides to Keep You Informed. Stay Updated With Our Latest Posts, Featuring Tips, Stories, and Valuable Knowledge for You.</p>
        </div>
    </div>
</section>

<!-- Blogs Section -->
<section class="blogs-section container">
    <div class="filter-tools">
        <div class="categories">
            <?php
            $categories = [
                "Finance", 
                "Stock Market", 
                "Cryptocurrency", 
                "Real Estate", 
                "Technology", 
                "Investment Tips"
            ];
            
            foreach ($categories as $category) {
                echo "<button class='category-btn' data-category='" . htmlspecialchars($category) . "'>$category</button>";
            }
            ?>
        </div>
        <div class="sorting">
    <div class="language">
        <p>Sort by Language</p>
        
            <select name="language" id="language-select" class="custom-select">
                <option value="English" data-image="./images/eng.png">English</option>
                <option value="Hindi" data-image="">Hindi</option>
                <option value="Marathi" data-image="">Marathi</option>
            </select>
    
    </div>
</div>
    </div>

    <div class="blogs">
        <div class="first-blog">
            <!-- Featured blog post -->
        </div>
        <div class="other-blog-cover">
            <!-- Other blog posts -->
        </div>
    </div>
</section>

<?php include 'inc.footer.php'; ?>