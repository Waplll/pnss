<?php
namespace App\Validators;

class ValidatorOnlyNum
{
    private array $errors = [];

    public function validate(array $data): bool
    {
        $this->errors = [];

        // Проверка наличия поля name
        if (empty($data['name'] ?? '')) {
            $this->errors['name'][] = 'Номер группы обязателен для заполнения';
            return false;
        }

        $groupNumber = $data['name'];

        // Проверка на цифры
        if (!ctype_digit($groupNumber)) {
            $this->errors['name'][] = 'Номер группы должен содержать только цифры';
        }

        // Проверка длины (3-5 цифр)
        if (strlen($groupNumber) < 3 || strlen($groupNumber) > 4) {
            $this->errors['name'][] = 'Номер группы должен содержать от 3 до 4 цифр';
        }

        return empty($this->errors);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getFirstError(): ?string
    {
        return $this->errors['name'][0] ?? null;
    }
}
