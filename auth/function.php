<?php

function isAdmin()
{
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
}

function countRows($pdo,$table){
    $stmt = $pdo -> prepare("SELECT COUNT(*) FROM {$table}");
    $stmt -> execute();
    return $stmt -> fetchColumn();
}

function countWhere($pdo,$table,$column,$value){
    $stmt = $pdo -> prepare("SELECT COUNT(*) FROM {$table} WHERE {$column} = ?");
    $stmt -> execute([$value]);
    return $stmt -> fetchColumn();
}

function countWhereMulti($pdo,$table,$condition){
    $columns = array_keys($condition);
    $value = array_values($condition);
    
    $where = implode(' AND ', array_map(fn($col) => "$col = ?", $columns));

    $stmt = $pdo -> prepare("SELECT COUNT(*) FROM {$table} WHERE $where");
    $stmt -> execute($value);
    return $stmt -> fetchColumn();
}
?>
