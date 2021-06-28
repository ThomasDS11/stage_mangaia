<?php

class helper
{

    /**
     * Our etablished PDO
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
}
?>