<?php
function getFeaturedProducts($conn)
{
    $query = "SELECT * FROM featured_products";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $featuredProducts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $featuredProducts;
    }
    return [];
}
