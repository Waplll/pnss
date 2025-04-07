<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?? 'Pop it MVC' ?></title>
    <link rel="stylesheet" href="../../public/css/style.css">
</head>
<body>
<header class="contForBackgroundPhoto">
    <div class="wraper firstBlockOfHeader">
        <div class="contForButtonLogin">
            <?php if (app()->auth::check()): ?>
                <?php if (app()->auth::user()->role === 'admin'): ?>
                    <button class="headerButtonLogin reg" onclick="window.location.href='<?= app()->route->getUrl('/register') ?>'">Регистрация</button>
                <?php endif; ?>
                <button class="headerButtonLogin" onclick="window.location.href='<?= app()->route->getUrl('/logout') ?>'">Выход</button>
            <?php else: ?>
                <button class="headerButtonLogin" onclick="window.location.href='<?= app()->route->getUrl('/login') ?>'">Вход</button>
            <?php endif; ?>
        </div>
        <?php if (app()->auth::check()): ?>
            <div class="mainButtonsForSearchAndMakeStudents">
                <div class="upperRowForButtons">
                    <div class="contForButtonMakeStudents">
                        <button class="headerButton" onclick="window.location.href='<?= app()->route->getUrl('/makeStudent') ?>'">Создать студента</button>
                    </div>
                    <div class="contForButtonMakeStudents">
                        <button class="headerButton" onclick="window.location.href='<?= app()->route->getUrl('/makeGroup') ?>'">Создание группы</button>
                    </div>
                    <div class="contForButtonMakeStudents">
                        <button class="headerButton" onclick="window.location.href='<?= app()->route->getUrl('/makeDiscipline') ?>'">Создание дисциплины</button>
                    </div>
                </div>
                <div class="lowerRowForButtons">
                    <div class="contForButtonCheckMarkStudent">
                        <button class="headerButton" onclick="window.location.href='<?= app()->route->getUrl('/showStudentGrades') ?>'">Выбрать успеваемость студента</button>
                    </div>
                    <div class="contForButtonCheckMarkGroupOrDisciplene">
                        <button class="headerButton" onclick="window.location.href='<?= app()->route->getUrl('/showGroupGrades') ?>'">Выбрать успеваемость по группам</button>
                    </div>
                    <div class="contForButtonMakeGroup">
                        <button class="headerButton" onclick="window.location.href='<?= app()->route->getUrl('/showGroupDisciplines') ?>'">Выбрать дисциплину</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="contForLogo">
            <a href="<?= app()->route->getUrl('/hello') ?>"><img class="logo" src="../../../practic2zadanie/public/image/graduation.png" alt="Логотип"></a>
        </div>
    </div>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .wraper{
            max-width:78.6458vw;
            width: 100vw;
            box-sizing: border-box;
            margin: 0 auto;
        }
        .reg {
            margin-right: 10px;
        }
        .firstBlockOfHeader{
            background-color: #71B2B5;
            height: 11.5741vh;
            display: flex;
            justify-content: space-around;

        }
        .contForBackgroundPhoto{
            width: 100vw;
            height: 44vh;
            background-image: url(../../../practic2zadanie/public/image/studento4ki.png);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .mainButtonsForSearchAndMakeStudents{
            display: flex;
            flex-direction: column;
            height: 7.7778vh;
            justify-content: space-between;
            margin-top: 1.6667vh;
        }
        .upperRowForButtons{
            display: flex;
            width: 39.1146vw;
            justify-content: space-between;
        }
        .lowerRowForButtons{
            display: flex;
            width: 39.1146vw;
            justify-content: space-between;
        }
        .group{
            margin-left: 3.8021vw;
        }
        .contForLogo{
            height:  11.5741vh;
            display: flex;
            align-items: center;
        }
        .logo{
            height: 5.5556vh;
            width: 3.1250vw;
        }
        .error {
            color: red;
            font-size: 12px;
            margin-top: 5px;
        }

        input:invalid {
            border-color: red;
        }
        .contForButtonLogin{
            height:  11.5741vh;
            display: flex;
            align-items: center;
        }
        .headerButton{
            width: 10.5208vw;
            height: 2.6852vh;
            font-size: 10px;
            font-weight: 600;
            background-color: black;
            color: white;
        }
        .headerButtonLogin{
            width: 5.6250vw;
            height: 2.6852vh;
            font-size: 10px;
            font-weight: 600;
            background-color: black;
            color: white;
        }
        .backgroundPhotoImg{
            width: 100vw;
            height: 44.4444vh;
        }

        .reg{
            margin-left: 1vw;
        }

        .classForSettingForm{
            display: flex;
            flex-direction: column;

        }
        .inputForm{
            width: 25.8333vw;
        }
        .MakeStudent{
            height: 35vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .checkDiscipleneForm{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 20vh;
            padding-top: 5vh;
        }
        .contForFormCheckDisciplene{
            display: flex;

        }
        .contForSeeDisciplene{
            border: 1px solid black;
            width: 18.4896vw;
            height: 32.8704vh;
        }
        .contForSee{
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-right:18vw ;
            padding-top: 5vh;
        }
        .numberCourse{
            display: flex;
            flex-direction: column;
        }
        .numberSemester{
            display: flex;
            flex-direction: column;
        }
        .seeDisciplene{
            margin-top: 1vh;
        }
        .checkMarkForDiscipleneAndHoursForm{
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            height: 20vh;
            padding-top: 7vh;
            width: 20vw;
        }
        .contForCheckDisciplene{
            display: flex;
            flex-direction: column;
        }
        .contForInputMakeGroup{
            display: flex;
            flex-direction: column;
        }
        .inputMakeGroup{
            width: 25.8333vw;
        }
        .inputMakeDisciplene{
            width: 25.8333vw;
        }
        .backgroundForLogin{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 39.5370vh;
            width: 46.8229vw;

            background-color: #71B2B5;
        }
        .contForLoginUser{
            height: 55.5556vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .loginForm{
            display: flex;
            flex-direction: column;
            height: 20vh;
            justify-content: space-between;
        }
        .inputLogin{
            height: 4.8148vh;
            width: 27.1354vw;
        }
        .register{
            height: 27.2222vh;
        }
    </style>
</header>
<main>
    <?= $content ?? '' ?>
</main>
</body>
</html>