# Задание на работу с сокетами и протоколом HTTP

## Задача 1

Требуется написать простое (простейшее) сокет-приложение.  
С одной стороны должен быть сокет-сервер, слушающий все входящие сообщения и отвечая на них.  
С другой стороны - сокет-клиент, отправляющий сообщения и показывающий ответ.  
Клиент и сервер должны быть написаны на разных языках - `PHP` и `JS (NodeJS)`.  
Причем не принципиально, на каком языке какую часть реализовывать.

### Логика работы

Все пересываемыне сообщения - текстовые.  
Логика работы сервера - на любое входящее сообщение, он отвечает этим же сообщением, обернутым в `You say: "<message>"`.  
Клиент должен выводить (печатать) все отправляемые и получаемые сообщения.

**Примеры:**  
Запрос - `Hello Bob`  
Ответ - `You say: "Hello Bob"`  
Запрос - `Hello "John"`  
Ответ - `You say: "Hello \"John\""`

### Проверка работы
В консоле запускаем сокет-сервер.  
В консоле же запускаем сокет-клиент, для выполнения запроса к серверу.  
Наблюдаем выполения запроса/ответа по выводимым сообщениям.

### Результат работы
Разработанные скрипты требуется положить в папаку `socket`.

## Задача 2

Требуется написать простой сокет-сервер.  
На сокет будут приходить HTTP запросы.  
На все запросы, сокет сервер должен отдавать HTTP ответы.  
Соскет-сервер можно писать на `PHP` или `JS (NodeJS)`.

### Логика работы
Любой входящий запрос должен парсится.  
Ответ должен содержать ту же версию протокола, которая была использована в запросе (т.е. требуется извлекать версию протокола из запроса).
Необходимо всегда возвращать 200 код ответа.  
Каждый четный запрос должен отдавать ответ в формате `text/plain`, каждый нечетный в формате `text/html`. Для отдачи контента в нужном формате, требуется использовать заголовок `Content-type`.  
Телом ответа, должен быть контен из файла `response.html`.

### Проверка работы
В консоле запускаем сокет-сервер.  
Запросы к сокет-серверу требуется производить из под браузера. Как итог, каждый четный запрос должен показывать html код, каждый нечетный обработанную html страницу.

### Результат работы
Разработанные скрипты требуется положить в папаку `http`.

# Дополнительно

## Материалы
 - PHP - работа с сокетами можо так - [ссылка](http://php.net/manual/en/book.sockets.php), или использовать потоки - [ссылка](http://php.net/manual/en/ref.stream.php);
 - NodeJS - работа с сокетами через модуль `net` - [ссылка](https://nodejs.org/api/net.html).

## Результат работы
Результат работы требуется запушить в репозиторий в отдельной ветке.  
Ветка должна называться так же, как логин пользователя в системе.

**Изменять `master` ветку - запрещено!**  

