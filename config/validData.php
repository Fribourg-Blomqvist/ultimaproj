<?php
//nettoyage des données/formatage
function valid_data($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}