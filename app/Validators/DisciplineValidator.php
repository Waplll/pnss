<?php
namespace App\Validators;

class DisciplineValidator
{
    private array $errors = [];

    public function validate(array $data): bool
    {
        $this->errors = [];

        // Проверка наличия названия
        if (empty($data['makeGroup'] ?? '')) {
            $this->errors['makeGroup'][] = 'Название дисциплины обязательно для заполнения';
            return false;
        }

        $disciplineName = trim($data['makeGroup']);

        // Проверка на русские буквы (включая ё) и пробелы/дефисы
        if (!preg_match('/^[а-яёА-ЯЁ\s\-]+$/u', $disciplineName)) {
            $this->errors['makeGroup'][] = 'Название должно содержать только русские буквы, пробелы и дефисы';
        }

        // Проверка длины названия (2-100 символов)
        $length = mb_strlen($disciplineName, 'UTF-8');
        if ($length < 2 || $length > 100) {
            $this->errors['makeGroup'][] = 'Название должно быть от 2 до 100 символов';
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getFirstError(): ?string
    {
        return $this->errors['makeGroup'][0] ?? null;
    }
}