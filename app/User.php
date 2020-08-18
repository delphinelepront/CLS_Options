<?php

namespace CLS;

class User extends Dbconnect
{
    public function getUsers(){
        $sql = "SELECT * FROM USER";
        $stmt = $this->Dbconnect()->query($sql);
        while ($row = $stmt->fetch())
        {
            echo $row['first_name'];
        }
    }

}