<?php

    namespace App\Support;

    use mysqli;

    abstract class Database{
        private $host = 'localhost';
        private $user = 'root';
        private $pass = '';
        private $db = 'ebrs';
        private $connection;

        private  function connection (){
            return $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->db);

    }

        /**
         * To insert data
         */
        protected function create($tbl, $data)
        {
            //get column name
            $col_name = array_keys($data);
            $cols = implode(',',$col_name);
            // get the values
            $all_values = array_values($data);
            $val = '';

            foreach($all_values as $v)
            {
                $val .= "'". $v . "',";
            }
            //echo $val;
            $values = substr($val, 0, -1);

            //echo $values;
            //echo $cols, $values ;

            $sql = "INSERT INTO $tbl ($cols) VALUES ($values)";

            //echo "<br><br>";
            //echo $sql;
            $status = $this->connection() -> query($sql);

            if ( $status)
            {
                return true;
            }
            else {
                return false;
            }
        }
        /**
         * To data select
         */
        public function all()
        {

        }
        /**
         * To delete data
         */
        public function delete()
        {

        }
        /**
         * To find single data
         */
        public function find()
        {

        }
        /**
         *To update data
         */
        public function update()
        {

        }
        public function customQuery($sql)
        {
            return $this->connection()-> query($sql);
        }

    }

