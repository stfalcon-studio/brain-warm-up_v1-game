Brain warm-up #1
===============


У двух игроков есть строка *s*, состоящая из строчных букв латинского алфавита. Они играют в игру, которая описывается следующими правилами:

Игроки ходят по очереди; За один ход игрок может удалить из строки *s* произвольную букву.
Если игрок перед своим ходом может перемешать буквы в строке *s* таким образом, чтобы получился палиндром, этот игрок побеждает. Палиндром — строка, которая одинаково читается в обоих направлениях. Например, строка «abba» — палиндром, а строка «abc» — нет.

*Определите*, кто из игроков победит при оптимальной игре обеих сторон — тот, кто ходит первым, или тот, кто ходит вторым.

## Входные данные
Во входных данных содержится единственная строка. Строка *s* состоит из строчных букв латинского алфавита.

## Выходные данные
В единственной строке выведите слово «First» в случае, если при оптимальной игре обоих игроков победит первый игрок. Иначе, выведите слово «Second». Слова выводите без кавычек.



## Workflow

- Форкаем репозиторий, создаем бранч вида `%login%-version`.
- Запускаем `install` через композер для автозагрузки классов.
- Копируем заготовку из папки `dist\*`, меняем везде `YourGitHubLogin` на свой логин от GitHub (не забываем об PSR-0)
- Пишем код, запускаем тесты (просто `phpunit` в папке с проектом), и т.д.
- Когда все тесты проходят — отправляем PR в `master`-ветку (пример https://github.com/ftrrtf/brain-warm-up-1/pull/1).
