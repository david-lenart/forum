<?php


class db
{
    protected $connection;

    public function __construct($host, $username, $password, $dbName)
    {
        $this->connection = new mysqli($host, $username, $password, $dbName);
    }

    public function addRecord($tablename, $params)
    {
        $columns = '';
        $values = '';
        foreach ($params as $key => $value) {
            $columns .= "`" . $key . "`,";
            $values .= "'" . $value . "',";
        }
        $columns = substr($columns, 0, -1);
        $values = substr($values, 0, -1);

        $sql = "INSERT INTO $tablename  ( $columns ) VALUES ( $values )";

        if ($this->connection->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

    public function updateRecord($tablename, $params)
    {
        $set = '';

        if (!array_key_exists('id', $params)) {
            echo "Error: ID Key in array is missing";
            exit;
        }
        foreach ($params as $key => $value) {
            $set .= "`$key` = '$value' ,";
        }
        $set = substr($set, 0, -1);

        $id = $params['id'];
        $sql = "UPDATE $tablename SET $set WHERE `id`= $id";

        if ($this->connection->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }

    public function deleteRecord($tablename, $params)
    {
        $delete = '';
        foreach ($params as $key => $value) {
            if (!empty($value)) {
                $delete .= '`' . $key . '`' . '= "' . $value . '" and ';
            }
        }
        $delete = substr($delete, 0, -5);

        $sql = "DELETE FROM $tablename WHERE $delete";
        if ($this->connection->query($sql) === FALSE) {
            echo "Error: " . $sql . "<br>" . $this->connection->error;
        }
    }


    public function getRecord($tablename, $params, $headers = null)
    {
        $get = '';
        $row = '';
        $select = '*';

        if (!empty($headers)) {
            $select = $headers;
        }

        foreach ($params as $key => $value) {
            if (!empty($value)) {
                $get .= '`' . $key . '`' . '= "' . $value . '" and ';
            }
        }
        $get = substr($get, 0, -5);

        $sql = "SELECT $select FROM $tablename  WHERE $get";
        if ($result = $this->connection->query($sql)) {
            $row = $result->fetch_object();
            if ($result->num_rows > 1) {
                echo "More than one record found";
            }
        }

        return $row;
    }


    public function getRecords($tablename, $params = null, $headers = null, $orderby = null)
    {
        $get = '';
        $rows = [];
        $select = '*';
        $order = 'ORDER BY `id` ASC ';

        if (!empty($headers)) {
            $select = "id," . $headers;
        }

        if (!empty($orderby)) {
            $order = 'ORDER BY ' . $orderby;
        }

        if (!empty($params)) {
            $get .= 'WHERE ';
            foreach ($params as $key => $value) {
                if (!empty($value)) {
                    $get .= '`' . $key . '`' . '= "' . $value . '" and ';
                }
            }
            $get = substr($get, 0, -5);
        }

        $sql = "SELECT $select FROM $tablename $get $order";
        if ($result = $this->connection->query($sql)) {
            while ($row = $result->fetch_object()) {
                $rows[$row->id] = $row;

            }
        }

        return $rows;
    }


    public function getRecordSql($sql)
    {
        $row = '';
        if ($result = $this->connection->query($sql)) {
            $row = $result->fetch_object();
            if ($result->num_rows > 1) {
                echo "More than one record found";
            }
        }

        return $row;
    }

    public function getRecordsSql($sql)
    {

    }


    public function recordExist($tablename, $params)
    {
        //TODO true : false
    }

}

