<?php


namespace App\Classes;


class DumpDatabase
{
    private const BACKUP = 0;
    private const RESTORE = 1;

    private $type;
    private $user;
    private $db;
    private $password;

    public $externalDbFileDirectory;
    public $hostName = '127.0.0.1';

    public function __construct(string $user, string $database, string $password, int $type = 0)
    {
        $this->type = $type;
        $this->user = $user;
        $this->db = $database;
        $this->password = $password;
        $this->checkType();
    }

    private function checkType(): void
    {
        if (!in_array($this->type, [self::BACKUP, self::RESTORE], true)) {
            throw new \InvalidArgumentException("'{$this->type}' is not available! Please, choose either 0 or 1.");
        }
    }

    private function checkExternalDbFile(): void
    {
        if (!$this->externalDbFileDirectory) {
            throw new \InvalidArgumentException("'externalDbFileDirectory' argument is mandatory.");
        }
    }

    public function execute(): string
    {
        $this->checkExternalDbFile();

        switch ($this->type) {
            case self::BACKUP:
                return $this->backup();
            case self::RESTORE:
                return $this->restore();
        }
    }

    private function restore(): string
    {
        try {
            $command = 'mysql -h ' . $this->hostName . ' -u ' . $this->user . ' -p ' . $this->password . ' ' . $this->db . ' < ' . $this->externalDbFileDirectory;
            exec($command, $output = [], $executed);

            return 'The data has been imported successfully!';
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function backup(): string
    {
        try {
            $command = 'mysqldump --opt -h ' . $this->hostName . ' -u ' . $this->user . ' -p ' . $this->password . ' ' . $this->db . ' > ' . $this->externalDbFileDirectory;
            $output = [];
            exec($command, $output, $executed);

            return 'The data has been imported successfully!';
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }
}
