<?php

require_once 'User.php';

class MyPDO extends PDO {

    //method of writing data to the database when registering a user
    public function insertUser(string $login, string $password, string $fname, string $lname, string $email, string $phone)
    {
        $stmt = $this->prepare("INSERT INTO users (`id`, `login`, `password`, `fname`, `lname`, `email`, `phone`) VALUES (?,?,?,?,?,?,?)");

        $stmt->execute([
            NULL,
            $login,
            $password,
            $fname,
            $lname,
            $email,
            $phone
        ]);
    }

    //method of update data to the database when registering a user
    public function updateUser(int $id, string $login, string $password, string $fname, string $lname, string $email, string $phone)
    {
        $stmt = $this->prepare("UPDATE `users` SET login=?, password=?, fname=?, lname=?, email=?, phone=? WHERE id=?");

        $stmt->execute([
            $login,
            $password,
            $fname,
            $lname,
            $email,
            $phone,
            $id
        ]);
    }

    // method of finding the user in the database
    public function findUser(string $login)
    {

        $result = $this->query("SELECT * FROM `users` WHERE `login` = '$login'");
        $result->setFetchMode(PDO::FETCH_CLASS, 'User');

        return $result->fetch();
    }

    //method of selecting information from the database and converting it into arrays
    public function selectFromDatabase(string $sql)
    {
        $result = $this->query($sql);
        $fetch = $result->fetchAll(\PDO::FETCH_ASSOC);

        return count($fetch) > 0;
    }
}
