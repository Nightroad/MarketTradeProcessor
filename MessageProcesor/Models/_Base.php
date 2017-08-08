<?php
/**
 * Created by PhpStorm.
 * User: Arch Gentoo
 * Date: 05.08.17
 * Time: 16:53
 */

namespace MarketTradeProcessor\MessageProcesor\Models;

use MarketTradeProcessor\Shared\Database;
use MarketTradeProcessor\MessageProcesor\Entities\_Base as Base_Entity;

class _Base {

    protected $dbTable = '';

    protected $dbFields = array();

    /**
     * @return \PDO
     */
    protected function getPDO()
    {
        return Database::getPDO();
    }

    public function getByFieldValue($field, $value)
    {
        $pdo = $this->getPDO();

        $queryString = sprintf('SELECT * FROM %s WHERE %s = %s LIMIT 1',
            $this->dbTable,
            $field,
            ':' . $field
        );

        $stmt = $pdo->prepare($queryString);
        $stmt->bindValue(':' . $field, $value, \PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getById($value)
    {
        return $this->getByFieldValue('id', $value);
    }

    public function collectSetters()
    {
        $setters = array();
        foreach($this->dbFields as $field)
        {
            $setters[] = '  ' . $field . ' = :'.$field;
        }

        return $setters;
    }

    public function collectData(Base_Entity $entity)
    {
        $output = array();
        foreach($this->dbFields as $field){
            $getter = 'get' . ucfirst($field);
            $value = $entity->{$getter}();

            if($value instanceof \DateTime)
            {
                $value = $value->format('Y-m-d H:i:s');
            }

            $output[$field] = $value;
        }
        return $output;
    }

    public function save(Base_Entity $entity)
    {
        $pdo = Database::getPDO();

        if ($entity->recordExists())
        {
            $action = 'UPDATE';
            $suffix = 'WHERE' .
                '  \'id\' = :id';
        }
        else
        {
            $action = 'INSERT INTO';
            $suffix = '';
        }

        $setters = $this->collectSetters($entity);

        $queryString = sprintf(
            '%s' . PHP_EOL .
            '  %s' . PHP_EOL .
            'SET' . PHP_EOL .
            join(",\n", $setters) . PHP_EOL .
            $suffix,
            $action, $this->dbTable);

        $stmt = $pdo->prepare($queryString);

        foreach($this->collectData($entity) as $field => $value)
        {
            $stmt->bindValue(':' . $field, $value, \PDO::PARAM_STR);
        }

        $stmt->execute();
        return ($stmt->errorCode() == 0);

    }

}