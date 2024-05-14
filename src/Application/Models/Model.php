<?php

namespace App\Application\Models;

use App\Application\DataBase\ConnectionDataBase;
use PDO;

class Model extends ConnectionDataBase
{

    // в $params передаем массив ключ - имя поля в базе, значение - значение в поле базы
    public function insertToBD(string $tableName, array $params): void
    {
        $fields = [];
        $bin = [];
        foreach ($params as $key => $value) {
            $fields[] = $key;
            $bin[] = ":{$key}";
        }
        $fields = implode(', ', $fields);
        $bin = implode(', ', $bin);
        $query = "INSERT INTO $tableName($fields) VALUES ($bin)";
        $addReport = $this->connect()->prepare($query);
        $addReport->execute($params);
    }

    public function findByField(string $tableName, string $fieldName, mixed $value): array|bool
    {
        $query = "SELECT * FROM $tableName WHERE $fieldName = :$fieldName";
        $result = $this->connect()->prepare($query);
        $result->execute(
            [$fieldName => $value]
        );
        return $result->fetch(PDO::FETCH_ASSOC);
    }
}