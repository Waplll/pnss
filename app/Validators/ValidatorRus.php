<?php


namespace App\Validators;

class ValidatorRus
{
    private array $errors = [];

    public function validate(array $data, array $rules): bool
    {
        foreach ($rules as $field => $rule) {
            $value = $data[$field] ?? null;

            foreach ($rule as $validator) {
                $this->validateField($field, $value, $validator);
            }
        }

        return empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }

    private function validateField(string $field, $value, string $validator): void
    {
        switch ($validator) {
            case 'required':
                if (empty(trim($value ?? ''))) {
                    $this->errors[$field][] = "Поле $field обязательно для заполнения";
                }
                break;

            case 'russian':
                if (!preg_match('/^[а-яёА-ЯЁ\s\-]+$/u', $value)) {
                    $this->errors[$field][] = "Поле $field должно содержать только русские буквы";
                }
                break;

            case 'name':
                if (!preg_match('/^[а-яёА-ЯЁ\s\-]{2,50}$/u', $value)) {
                    $this->errors[$field][] = "Поле $field должно содержать 2-50 русских букв";
                }
                break;

            case 'address':
                if (!preg_match('/^[а-яёА-ЯЁ0-9\s\-\.,]+$/u', $value)) {
                    $this->errors[$field][] = "Поле $field содержит недопустимые символы";
                }
                break;
        }
    }
}
