<?php
/**
 * Dynamic Pagination Component
 * 
 * @param int $currentPage Current active page
 * @param int $totalPages Total number of pages
 * @param string $baseUrl Base URL for pagination links (optional)
 * @param int $visiblePages Number of page links to show (optional, default 5)
 * @return string HTML for pagination
 */
function renderPagination($currentPage, $totalPages, $baseUrl = '#', $visiblePages = 5) {
    // Validate inputs
    $currentPage = max(1, min($currentPage, $totalPages));
    $visiblePages = max(3, min($visiblePages, $totalPages));
    
    // Calculate the range of visible page numbers
    $halfVisible = floor($visiblePages / 2);
    $startPage = max(1, min($currentPage - $halfVisible, $totalPages - $visiblePages + 1));
    $endPage = min($totalPages, $startPage + $visiblePages - 1);
    
    // Adjust if we're at the end of the range
    if ($endPage - $startPage + 1 < $visiblePages) {
        $startPage = max(1, $endPage - $visiblePages + 1);
    }
    
    // Start building the pagination HTML
    $html = '<div class="pagination">';
    
    // First page and previous page buttons
    $prevDisabled = ($currentPage <= 1) ? ' disabled' : '';
    $html .= '<a href="' . ($currentPage > 1 ? $baseUrl . '?page=1' : '#') . '" class="first-page' . $prevDisabled . '" title="First Page">&laquo;&laquo;</a>';
    $html .= '<a href="' . ($currentPage > 1 ? $baseUrl . '?page=' . ($currentPage - 1) : '#') . '" class="prev-page' . $prevDisabled . '" title="Previous Page">&laquo;</a>';
    
    // Page numbers
    if ($startPage > 1) {
        $html .= '<a href="' . $baseUrl . '?page=1">1</a>';
        if ($startPage > 2) {
            $html .= '<a class="ellipsis">...</a>';
        }
    }
    
    for ($i = $startPage; $i <= $endPage; $i++) {
        $activeClass = ($i == $currentPage) ? ' class="active"' : '';
        $html .= '<a href="' . $baseUrl . '?page=' . $i . '"' . $activeClass . '>' . $i . '</a>';
    }
    
    if ($endPage < $totalPages) {
        if ($endPage < $totalPages - 1) {
            $html .= '<a class="ellipsis">...</a>';
        }
        $html .= '<a href="' . $baseUrl . '?page=' . $totalPages . '">' . $totalPages . '</a>';
    }
    
    // Next page and last page buttons
    $nextDisabled = ($currentPage >= $totalPages) ? ' disabled' : '';
    $html .= '<a href="' . ($currentPage < $totalPages ? $baseUrl . '?page=' . ($currentPage + 1) : '#') . '" class="next-page' . $nextDisabled . '" title="Next Page">&raquo;</a>';
    $html .= '<a href="' . ($currentPage < $totalPages ? $baseUrl . '?page=' . $totalPages : '#') . '" class="last-page' . $nextDisabled . '" title="Last Page">&raquo;&raquo;</a>';
    
    $html .= '</div>';
    
    return $html;
}
?>