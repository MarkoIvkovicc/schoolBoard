<?php


class queryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function selectAll($student)
    {
        $stat  = $this->pdo->prepare("select * from {$student}");
        $stat->execute();
        return $stat->fetchAll(PDO::FETCH_CLASS);
    }

    /**
     * @return mixed
     */
    public function getGrades($table)
    {
        $id = $_GET('id');
        $stat  = $this->pdo->prepare("SELECT id_student, ((`oop` + `web_programming` + `back_end_programming` + `front_end_programming`)/4) FROM {$table} where  id={$id}");
        $stat->execute();
        return $stat->fetchAll(PDO::FETCH_CLASS);
    }
}