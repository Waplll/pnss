<?php

namespace App\Controller;

use App\Model\Student;
use App\Model\Group;
use App\Model\Grade;
use App\Model\Discipline;
use Src\View;
use Src\Request;


class Authorised
{
    public function makeStudent(Request $request): string
    {
        $groups = \App\Model\Group::all();
        if ($groups->isEmpty()) {
            throw new \RuntimeException('No groups found in database');
        }
        if ($request->method === 'POST') {
            $group = Group::where('name', $request->group_id)->first();
            Student::create([
                'surname' => $request->surname,
                'name' => $request->name,
                'patronymic' => $request->patronymic,
                'gender' => $request->gender,
                'dateBirthday' => $request->dateBirthday,
                'address' => $request->address,
                'group_id' => $group->id // Используем реальный ID группы
            ]);
            return app()->route->redirect('/hello');



        }

        // Если метод GET, показываем форму
        return (string) new View('employee.makeStudent', ['groups' => $groups]);
    }
}
