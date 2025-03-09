<?php include 'inc.header.php'; include 'blog-component.php'; include 'pagination-component.php';

$itemsPerPage = 1; // Number of blog posts per page
$totalItems = count($blogPosts); // Total number of blog posts
$totalPages = ceil($totalItems / $itemsPerPage);

// Get current page from URL parameter, default to page 1
$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$currentPage = max(1, min($currentPage, $totalPages)); // Ensure valid page number

// Calculate the slice of posts to display on the current page
$offset = ($currentPage - 1) * $itemsPerPage;
$currentPagePosts = array_slice($blogPosts, $offset, $itemsPerPage);
?>






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
            <p>Discover Expert Insights, Industry Trends, and Helpful Guides to Keep You Informed. Stay Updated With Our
                Latest Posts, Featuring Tips, Stories, and Valuable Knowledge for You.</p>
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
                    <img src="https://cdn1.iconfinder.com/data/icons/arrows-vol-1-5/24/dropdown_arrow2-512.png" alt=""
                        class="dropdown-arrow">
                    <option value="English" data-image="./images/eng.png">English</option>
                    <option value="Hindi" data-image="./images/hindi.svg">Hindi</option>
                    <option value="Marathi" data-image="./images/french.webp">French</option>
                </select>

            </div>
            <div class=" language sortBy " id="sortBy">
                <p>Sort by</p>
                <select name="language" id="language-select" class="sortBySelect">
                    <img src="https://cdn1.iconfinder.com/data/icons/arrows-vol-1-5/24/dropdown_arrow2-512.png" alt=""
                        class="dropdown-arrow">
                    <option value="Most Popular">Most Popular</option>
                    <option value="Most Popular">Most Commented</option>
                    <option value="Most Popular">Trending</option>
                    <option value="Most Popular">By Author</option>
                    <option value="Most Popular">This Week</option>
                    <option value="Most Popular">This Month</option>
                    <option value="Most Popular">This Year</option>
                    <option value="Most Popular">By Language</option>

                </select>
            </div>
        </div>
    </div>

    <div class="blogs">
        
        <div class="first-blog">
            <div class="categoryLabel">
                   Finance
            </div>
            <img src="./images/firstBlog.jpeg" alt="" class="firstBlogImg">
            <div class="blogDescriptionCover">
                <div class="blogHead">
                    <img src="./images/12.png" alt="" class="authorImg">
                    <div class="author">
                        <p>Written By: </p>
                        <h5>MARCUS RUHNAU</h5>
                    </div>
                    <div class="author">
                        <p>Posted: </p>
                        <h6>Today</h6>
                    </div>

                    <div class="reacts">
                        <p>354</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="heartIcon" viewBox="0 0 24 24" fill="green" stroke="green" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
  <path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 0 0-7.8 7.8l1 1 8 8 8-8 1-1a5.5 5.5 0 0 0 0-7.8z"></path>
</svg>
                    </div>
                </div>
                <h3 class="blogTitle">
                    A pretium volutpat tincidunt
                    dignissim diam. Porta nec sit ut
                    lobortis massa rutrum duis. Posuere
                    mauris ut pellentesque magna sit
                    risus donec.
                </h3>
                <p class="blogDescription">
                    Dictum Sed Purus Ultrices Mauris Ornare. Ac Quis Sed Egestas
                    Egestas Enim In Interdum Sit. Euismod Urna Posuere ld Augue
                    Vulputate Sed In. Tempus Aliquet Fames Vel Nibh Malesuada.
                    Euismod Et Metus Tempus Rhoncus Tortor Bibendum Eget. Semper
                    Enim Mauris Gravida Risus Lectus Massa Purus Egestas Fusce.
                    Auctor Elementum Sollicitudin ld Amet. Tempus Malesuada Velit
                    Quis Egestas. Gravida In Ac Erat Risus Vitae. Enim Volutpat Dis
                    Vulputate Mattis Urna Donec Turpis. Duis Mauris Tellus Sem Facilisi
                    Tincidunt Habitasse In Vul utate Ut. Lacus Sem er Sit Vestibulum.
                </p>
                <div class="blogFooter">
                    <div class="comments">
                        <img src="./images/comment.png" alt="" class="commentIcon">
                        <p>186 Comments</p>
                    </div>
                    <div class="flag">
                        <img src="./images/french.webp" alt="" class="flagImg">
                        <p>3 min read</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="other-blog-cover">
        <?php
            echo renderBlogSection($blogPosts);
            ?>
        </div>
        <div class="pagination">
            <section class="pagination-section">
                <?php echo renderPagination($currentPage, $totalPages, 'index.php', 5); ?>
            </section>
        </div>
    </div>

    
</section>

<?php include 'inc.footer.php'; ?>