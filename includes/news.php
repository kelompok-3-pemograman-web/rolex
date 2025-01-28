<?php
function getTotalNews($conn)
{
    $query = "SELECT COUNT(*) AS total_news FROM news";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        return $data['total_news'];
    }
    return 0;
}

function getNews($conn)
{
    $query = "SELECT * FROM news";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $news = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $news;
    }
    return [];
}
