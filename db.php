<?php
class database
{
    private $host;
    private $dbusername;
    private $dbpassword;
    private $dbname;

    protected function connect()
    {
        $this->host = 'localhost';
        $this->dbusername = 'root';
        $this->dbpassword = '';
        $this->dbname = 'snigdhadeb';

        $conn = new mysqli($this->host, $this->dbusername, $this->dbpassword, $this->dbname);
        return $conn;
    }
}
class query1 extends database
{
    //fetch data from database function
    public function getdata($tname, $field = '*', $conditionArr = '', $order_by_filed = '', $order_by_type = 'desc', $limit = '')
    {
        $sql = "select $field from $tname";
        if ($conditionArr != '') {
            $sql .= ' where ';
            $c = count($conditionArr);
            $i = 1;

            foreach ($conditionArr as $key => $val) {
                if ($i == $c) {
                    $sql .= " $key='$val'";
                } else {
                    $sql .= " $key='$val' and ";
                }
                $i++;
            }
        }
        if ($order_by_filed != '') {
            $sql .= " order by $order_by_filed $order_by_type ";
        }
        if ($limit != '') {
            $sql .= " limit $limit ";
        }
        //die($sql);
        $query = $this->connect()->query($sql);
        if ($query->num_rows > 0) {
            $arr = array();
            while ($row = $query->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } else {
            return 0;
        }
    }

    //insert data from database
    public function insertdata($tname, $conditionArr)
    {
        if ($conditionArr != '') {
            foreach ($conditionArr as $key => $val) {
                $fieldArr[] = $key;
                $valueArr[] = $val;
            }
            $field = implode(" , ", $fieldArr);
            $value = implode("' , '", $valueArr);
            $value = "'" . $value . "'";
            //echo $value;
            //die();
            $sql = "insert into $tname ($field) values ($value) ";
            $query = $this->connect()->query($sql);
        }
    }

    //delete function
    public function deletedata($tname, $conditionArr)
    {

        if ($conditionArr != '') {
            $sql = "delete from $tname where ";
            $c = count($conditionArr);
            $i = 1;

            foreach ($conditionArr as $key => $val) {
                if ($i == $c) {
                    $sql .= " $key='$val'";
                } else {
                    $sql .= " $key='$val' and ";
                }
                $i++;
            }
            // echo $sql;
            // die();
            $query = $this->connect()->query($sql);
        }
    }

    //update in table function

    public function updatedata($tname, $conditionArr,$where_field,$where_value)
    {

        if ($conditionArr != '') {
            $sql = "update $tname set ";
            $c = count($conditionArr);
            $i = 1;

            foreach ($conditionArr as $key => $val) {
                if ($i == $c) {
                    $sql .= " $key='$val'";
                } else {
                    $sql .= " $key='$val' , ";
                }
                $i++;
            }
            $sql .= " where $where_field = '$where_value' ";
            //echo $sql;
            //die();
            $query = $this->connect()->query($sql);
        }
    }

    public function get_safe_str($str){
        if($str != ''){
            return mysqli_real_escape_string($this->connect(), $str);
        
        }
    }
}
