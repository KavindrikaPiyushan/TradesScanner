<?php
/**
 * Dynamic Pagination Component
 * 
 * Shows first two and last two page numbers when total pages > 4
 * 
 * @param int $currentPage Current active page
 * @param int $totalPages Total number of pages
 * @param string $baseUrl Base URL for pagination links (optional)
 * @return string HTML for pagination
 */
function renderPagination($currentPage, $totalPages, $baseUrl = '#') {
    // Validate inputs
    $currentPage = max(1, min($currentPage, $totalPages));
    
    // Start building the pagination HTML
    $html = '<div class="pagination">';
    
    // First page and previous page buttons
    $prevDisabled = ($currentPage <= 1) ? ' disabled' : '';
    $html .= '<a href="' . ($currentPage > 1 ? $baseUrl . '?page=1' : '#') . '" class="first-page' . $prevDisabled . '" title="First Page">&laquo;&laquo;</a>';
    $html .= '<a href="' . ($currentPage > 1 ? $baseUrl . '?page=' . ($currentPage - 1) : '#') . '" class="prev-page' . $prevDisabled . '" title="Previous Page">&laquo;</a>';
    
    // Always show first two pages
    for ($i = 1; $i <= min(2, $totalPages); $i++) {
        $activeClass = ($i == $currentPage) ? ' class="active"' : '';
        $html .= '<a href="' . $baseUrl . '?page=' . $i . '"' . $activeClass . '>' . $i . '</a>';
    }
    
    // If current page is not in first two or last two, show ellipsis and current page
    if ($totalPages > 4 && $currentPage > 2 && $currentPage < $totalPages - 1) {
        if ($currentPage > 3) {
            $html .= '<a class="ellipsis">...</a>';
        }
        
        $html .= '<a href="' . $baseUrl . '?page=' . $currentPage . '" class="active">' . $currentPage . '</a>';
        
        if ($currentPage < $totalPages - 2) {
            $html .= '<a class="ellipsis">...</a>';
        }
    } elseif ($totalPages > 4) {
        // Just show ellipsis between first two and last two
        $html .= '<a class="ellipsis">...</a>';
    }
    
    // Always show last two pages if total pages > 2
    if ($totalPages > 2) {
        for ($i = max(3, $totalPages - 1); $i <= $totalPages; $i++) {
            $activeClass = ($i == $currentPage) ? ' class="active"' : '';
            $html .= '<a href="' . $baseUrl . '?page=' . $i . '"' . $activeClass . '>' . $i . '</a>';
        }
    }
    
    // Next page and last page buttons
    $nextDisabled = ($currentPage >= $totalPages) ? ' disabled' : '';
    $html .= '<a href="' . ($currentPage < $totalPages ? $baseUrl . '?page=' . ($currentPage + 1) : '#') . '" class="next-page' . $nextDisabled . '" title="Next Page">&raquo;</a>';
    $html .= '<a href="' . ($currentPage < $totalPages ? $baseUrl . '?page=' . $totalPages : '#') . '" class="last-page' . $nextDisabled . '" title="Last Page">&raquo;&raquo;</a>';
    
    $html .= '</div>';
    
    return $html;
}
?>