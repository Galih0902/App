<?php
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];
    
    // Lakukan operasi pencarian berdasarkan $searchQuery
    // ...
    // Contoh: Tampilkan hasil pencarian
    echo "Hasil pencarian untuk: " . $searchQuery;
}
