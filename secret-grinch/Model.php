<?php
// require_once $_SERVER['DOCUMENT_ROOT'] . "/App/DB/DB.php";
require_once "DB.php";

abstract class Model
{
    public static $table;

    public static function get_all()
    {
        try {
            $connect = DB::connect();
            $table = static::$table; // название таблицы
            $sql = "SELECT * FROM $table";
            $req = $connect->prepare($sql);
            $req->execute();
            return $req->fetchAll();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }

    public static function get_one(int $id)
    {
        try {
            $connect = DB::connect();
            $table = static::$table; // название таблицы
            $sql = "SELECT * FROM $table WHERE id = :id";
            $req = $connect->prepare($sql);
            $req->execute(["id" => $id]);
            return $req->fetch();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }
    public static function get_by_name(string $name)
    {
        try {
            $connect = DB::connect();
            $table = static::$table; // название таблицы
            $sql = "SELECT * FROM $table WHERE name = :name";
            $req = $connect->prepare($sql);
            $req->execute( ["name" => $name]);
            return $req->fetch();
            // echo "<br>";
            // echo "you did it";
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }


    public static function add(array $data)
    {
        try {
            $connect = DB::connect();
            $table = static::$table; // название таблицы
            $sql = "INSERT INTO $table ";
            $keys = array_keys($data);
            $count_keys = count($keys);
            $keys_str = implode(",", $keys);
            $sql .= " ($keys_str) VALUES (";
            for ($i = 0; $i < $count_keys; $i++) {
                $sql .= "?,";
            }
            $sql = substr($sql, 0, -1); // убираем лишнюю ,
            $sql .= ")";

            $req = $connect->prepare($sql);
            $req->execute(array_values($data));
            return $req->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }

    public static function delete(array $params = [])
    {
        try {
            $exec = [];
            $table = static::$table;
            $sql = "DELETE FROM $table ";
            if ($params) { // если параметры есть
                $sql .= " WHERE ";
                foreach ($params as $param) {
                    $key = $param[0];
                    $oper = $param[1];
                    $value = $param[2];
                    $logic = isset($param[3]) ? $param[3] : ""; // лог оператор
                    array_push($exec, $value);
                    $sql .= " $key $oper ? $logic";
                }
            }
            $connect = DB::connect();
            $req = $connect->prepare($sql);
            $req->execute($exec);
            return $req->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }
    }

    // UPDATE таблица SET кол1 = значение1, ... (WHERE name = Иван, ...)
    // UPDATE `classrooms` SET `number`='[value-2]',`name`='[value-3]',`count_of_places`='[value-4]' WHERE 1
    /*
    $params = [
        ["number", 188],
        ["name", "Естествознание", ],
        ["count_of_places", 38]
        ["Where", "id", "=", "10"]
    ];
    */
    public static function update($params){
        try {
            
            $connect = DB::connect();
            $exec = [];
            $table = static::$table;
            $sql = "UPDATE $table SET";
            $counter = 1;
                foreach ($params as $param) {
                    if(count($param) == 4) {
                        if ($counter >= 1 ) {
                            $counter-=1;
                            $sql = substr($sql, 0, -2);
                        }
                     
                    $logic = $param[0]; // лог оператор
                    $key = $param[1];
                    $oper = $param[2];
                    $value = $param[3];
                    array_push($exec, $value);
                    $sql .= " $logic $key $oper ? ";
                    }
                    else {

                        $key = $param[0];
                        $value = $param[1];
                        array_push($exec, $value);
                        $sql .= " $key = ?, ";
                    }
                }
            $req = $connect->prepare($sql);
            $req->execute($exec);
            // $sql .= " $index and $length";
            // return $sql;
            return $req->rowCount();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            return null;
        }    }


}
