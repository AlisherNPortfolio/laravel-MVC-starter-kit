<?php
namespace App\Classes;

trait Translating {
    public function translated(string $column)
    {
        $this->checkColumn($column);

        $column = $this->getAttributes()[$column];
        $column = json_decode($column, true);
        return $column[current_lang()] ?? $this->{$column};
    }

    public function original(string $column)
    {
        $this->checkColumn($column);
        return json_decode($this->getAttributes()[$column], true);
    }

    protected function checkColumn(string $column)
    {
        $columns = $this->translatings ?? [];
        if (!in_array($column, $columns, true)) {
            throw new \InvalidArgumentException("There is no the '{$column}' column in translations property!");
        }
    }

}
