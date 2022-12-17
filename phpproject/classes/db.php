<?php
class db
{
    const host = "localhost";
    const user = "root";
    const pass = null;
    const dbname = "batch77project";
    public static object $conn;
    public function __construct()
    {
        db::$conn = mysqli_connect(db::host, db::user, db::pass, db::dbname);
    }
}
new db();
