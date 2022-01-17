# burgers

> Тестовый проект 

#### Задание

- [Скачайте верстку](https://drive.google.com/file/d/1NFFTl_9pUXUorLIxzJ-cQ8oAwZJss5NZ/view?usp=sharing) сайта “Бургерная”

- Внизу вы найдете форму заказа, напишите скрипт, обрабатывающий эту форму. Скрипт должен:

- Проверить, существует ли уже пользователь с таким email, если нет - создать его, если да - увеличить число заказов по этому email. Двух пользователей с одинаковым email быть не может.

- Сохранить данные заказа - id пользователя, сделавшего заказ, дату заказа, полный адрес клиента.

- Скрипт должен вывести пользователю:

```
Спасибо, ваш заказ будет доставлен по адресу: “тут адрес клиента”
Номер вашего заказа: #ID
Это ваш n-й заказ!
```

Где **ID** - уникальный идентификатор только что созданного заказа n - общий кол-во заказов, который сделал пользователь с этим email включая текущий

**Оформление не требуется, достаточно текста на белом фоне, отбитого переходами строк.**