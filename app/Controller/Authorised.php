<?php

namespace App\Controller;

use App\Model\Student;
use App\Model\Group;
use App\Model\Grade;
use App\Model\Discipline;
use Src\View;
use Src\Request;
use App\Model\User;


class Authorised
{
    public function makeStudent(Request $request): string
    {
        $groups = \App\Model\Group::all();
        if ($groups->isEmpty()) {
            throw new \RuntimeException('No groups found in database');
        }
        if ($request->method === 'POST') {
            $validator = new \App\Validators\ValidatorRus();
            $rules = [
                'surname' => ['required', 'russian', 'name'],
                'name' => ['required', 'russian', 'name'],
                'patronymic' => ['russian', 'name'],
                'gender' => ['required'],
                'address' => ['required', 'address'],
                'group_id' => ['required']
            ];
            $group = Group::where('name', $request->group_id)->first();
            if ($validator->validate($request->all(), $rules)) {
                // Все данные валидны, создаем студента
                Student::create([
                    'surname' => $request->surname,
                    'name' => $request->name,
                    'patronymic' => $request->patronymic,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'group_id' => $request->group_id
                ]);

                return app()->route->redirect('/hello');
            } else {
                // Есть ошибки валидации
                return (string)new View('employee.makeStudent', [
                    'groups' => $groups,
                    'errors' => $validator->errors(),
                    'old' => $request->all()
                ]);
            }
        }

        // Если метод GET, показываем форму
        return (string)new View('employee.makeStudent', ['groups' => $groups]);
    }

    public function makeGroup(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new \App\Validators\ValidatorOnlyNum();

            if ($validator->validate($request->all())) {
                // Валидация пройдена
                Group::create([
                    'name' => $request->name
                ]);

                return app()->route->redirect('/hello');
            } else {
                // Есть ошибки валидации
                return (string)new View('employee.makeGroup', [
                    'error' => $validator->getFirstError(),
                    'oldName' => $request->name
                ]);
            }
        }

        // GET запрос
        return (string)new View('employee.makeGroup');
    }

    public function makeDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new \App\Validators\DisciplineValidator();

            if ($validator->validate($request->all())) {
                // Валидация успешна
                Discipline::create([
                    'name' => $request->makeGroup
                ]);

                return app()->route->redirect('/hello');
            } else {
                // Есть ошибки валидации
                return (string)new View('employee.makeDiscipline', [
                    'error' => $validator->getFirstError(),
                    'oldName' => $request->makeGroup
                ]);
            }
        }

        return (string)new View('employee.makeDiscipline');
    }

    public function showStudentGrades(Request $request): string
    {
        // Получаем все дисциплины
        $disciplines = Discipline::all();

        // Получаем уникальные типы контроля из таблицы grades
        $controlTypes = Grade::select('control_type')
            ->whereNotNull('control_type')
            ->distinct()
            ->pluck('control_type')
            ->toArray();

        // Обработка формы
        if ($request->method === 'POST') {
            $disciplineName = $request->checkDisciplene;
            $hours = $request->hours;
            $controlType = $request->control_type; // Получаем тип контроля из формы

            // Получаем оценки по выбранным параметрам
            $grades = Grade::with(['student', 'discipline'])
                ->whereHas('discipline', function ($query) use ($disciplineName) {
                    $query->where('name', $disciplineName);
                })
                ->when($hours, function ($query, $hours) {
                    return $query->where('hours', $hours);
                })
                ->when($controlType, function ($query, $controlType) {
                    return $query->where('control_type', $controlType);
                })
                ->get();

            // Формируем результаты для вывода
            $results = [];
            foreach ($grades as $grade) {
                $results[] = [
                    'student' => $grade->student->surname . ' ' . $grade->student->name,
                    'discipline' => $grade->discipline->name,
                    'grade' => $grade->grade ?? 'нет оценки',
                    'hours' => $grade->hours,
                    'control_type' => $grade->control_type ?? 'не указан'
                ];
            }

            return (string)new View('employee.studentGrades', [
                'disciplines' => $disciplines,
                'controlTypes' => $controlTypes,
                'results' => $results,
                'selectedDiscipline' => $disciplineName,
                'selectedHours' => $hours,
                'selectedControl' => $controlType
            ]);
        }

        // GET запрос - показываем форму
        return (string)new View('employee.studentGrades', [
            'disciplines' => $disciplines,
            'controlTypes' => $controlTypes
        ]);
    }

    public function showGroupGrades(Request $request): string
    {
        // Получаем все группы и дисциплины для выпадающих списков
        $groups = Group::all();
        $disciplines = Discipline::all();

        if ($request->method === 'POST') {
            // Получаем выбранные значения из формы
            $disciplineName = $request->checkDisciplene;
            $groupName = $request->group_name;

            // Ищем оценки для выбранной группы и дисциплины
            $grades = Grade::with(['student', 'discipline', 'student.group'])
                ->whereHas('discipline', function ($query) use ($disciplineName) {
                    $query->where('name', $disciplineName);
                })
                ->whereHas('student.group', function ($query) use ($groupName) {
                    $query->where('name', $groupName);
                })
                ->get();

            // Формируем результаты для отображения
            $results = [];
            foreach ($grades as $grade) {
                $results[] = [
                    'student' => $grade->student->surname . ' ' . $grade->student->name,
                    'group' => $grade->student->group->name,
                    'discipline' => $grade->discipline->name,
                    'grade' => $grade->grade ?? 'нет оценки',
                    'hours' => $grade->hours,
                    'control_type' => $grade->control_type
                ];
            }

            return (string)new View('employee.groupGrades', [
                'groups' => $groups,
                'disciplines' => $disciplines,
                'results' => $results,
                'selectedDiscipline' => $disciplineName,
                'selectedGroup' => $groupName
            ]);
        }

        // GET запрос - показываем форму
        return (string)new View('employee.groupGrades', [
            'groups' => $groups,
            'disciplines' => $disciplines
        ]);
    }

    public function showGroupDisciplines(Request $request): string
    {
        $groups = Group::all();

        if ($request->method === 'POST') {
            // 1. Находим конкретную группу по ID
            $group = Group::find($request->group);

            // 2. Проверяем, что группа найдена
            if (!$group) {
                throw new \Exception("Группа не найдена");
            }

            // 3. Получаем дисциплины через отношение
            $disciplines = $group->disciplines;

            return (string)new View('employee.groupDisciplines', [
                'groups' => $groups,
                'disciplines' => $disciplines,
                'selectedGroup' => $request->group
            ]);
        }

        return (string)new View('employee.groupDisciplines', [
            'groups' => $groups,
            'disciplines' => collect()
        ]);
    }

    public function register(Request $request): string
    {


        // Обработка POST-запроса
        if ($request->method === 'POST') {
            $validator = new \App\Validators\RegisterValidator();

            if ($validator->validate($request->all())) {
                // Валидация успешна
                User::create([
                    'name' => $request->name,
                    'login' => $request->login,
                    'password' => md5($request->password),
                    'role' => 'employee'
                ]);

                return app()->route->redirect('/hello');
            } else {
                // Есть ошибки валидации
                return (string)new View('admin.register', [
                    'error' => $validator->getFirstError(),
                    'old' => $request->all()
                ]);
            }
        }

        return (string)new View('admin.register');
    }
}