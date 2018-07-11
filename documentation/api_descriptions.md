# Документация к ROOME API's


######[Поиск](#markdown-header-1)
######[Регистрация нового пользователя](#markdown-header-2)
######[Вход в систему](#markdown-header-3)
######[Список всех регионов вместе с Астаной и Алматой](#markdown-header-4)
######[Список всех городов регионов или райнов Астаны и Алматы](#markdown-header-5)
######[Получение полной информации объявления](#markdown-header-6)
######[Поставить лайк на объявление](#markdown-header-7)
######[Добавить объявление. Статус 0.](#markdown-header-8)
######[Добавить объявление. Статус 1.](#markdown-header-9)
######[Добавить объявление. Статус 2.](#markdown-header-10)
######[Завершающая стадия подачи объявления. Статус 3.](#markdown-header-11)
######[API для проверки текущего статуса объявления.](#markdown-header-12)
######[Подать заявку на объявление арендатором.](#markdown-header-13)
######[Одобрить заявку арендатора и отклонить другие заявки.](#markdown-header-14)
######[Просмотр всех заявок от арендаторов.](#markdown-header-15)
######[Просмотр всех объявлении, на которые были поданы заявки арендатором.](#markdown-header-16)

######[Получить всю информацию о пользователе.](#markdown-header-17)
######[Заполнить анкету арендатора.](#markdown-header-18)
######[Просмотреть все объявления арендадателя.](#markdown-header-19)
######[Заполнить анкету арендадателя.](#markdown-header-20)

 

##1
## Получить все объявления по городу и типу жилья
___
Данные доступны всем пользователям

```POST /api/ads/search``` 


### Описание

**Важно**
Поиск аренды квартиры, комнаты или дома. При запросе к API, вы можете отправлять только те параметры, которые выбрал пользователь в соответствии типу данных параметра.

| Имя        | Тип          | Описание   |
| -----------|--------------| ---------
| region_id  | integer      |  ID региона|
| city_id    | integer      |  ID города |
| district_id| integer      |  ID района |
| house_type | integer      |  0 - Квартира, 1 - Комната, 2 - Дом |
| price_from | integer      |  Цена аренды от |
| price_to   | integer      |  Цена аренды до |
| floor_from | integer      |  Этаж квартиры/команты от|
| floor_to   | integer      |  Этаж квартиры/команты до|
| room_from  | integer      |  Количество комнат от|
| room_to    | integer      |  Количество комнат до|
| beds_from  | integer      |  Количество кроватей от|
| beds_to    | integer      |  Количество кроваетй до|
| bathroom_from| integer    |  Количество ванных комнат от|
| bathroom_to| integer      |  Количество ванных комнат до|
| home_phone | boolean |  Домашний телефон |
| wifi       | boolean |  WIFI |
| cupboard   | boolean |  Шкаф |
| plastic_win| boolean |  Пластиковые окна|
| tv         | boolean |  Телевизор       |
| washer     | boolean |  Стиральная машина|
| lift  | boolean |  Двуспальная кровать|
| iron       | boolean |  Утюг               |
| cabel_tv   | boolean |  Кабельное телевидение|
| parking_place| boolean |  Парковочные места|
| domofon    | boolean |  Домофон|
| security   | boolean |  Охрана |
| gate       | boolean |  Шлагбаум|
| street_lighting| boolean | Уличное освещение |
| fen        | boolean |  Фен|
| shower_cabin| boolean |  Душевая кабина|
| bath       | boolean |  Ванная комната|
| dryer      | boolean |  Сушилка |
| vac        | boolean |  Пылесос |
| univer     | boolean | Универ              | 
| grocer     | boolean | Продуктовый магазин |
| school     | boolean |  Школа      |
| playschool | boolean |  Десткий сад|
| hospital   | boolean |  Больница   |
| sport_complex| boolean | Спортивный комплекс |
| mart       | boolean |  ТРЦ   |
| pharmacy   | boolean |  Аптека|




### Пример запроса

```javascript
{
	"city_id": 1,
	"house_type": 0,
    "price_from": 100000,
    "price_to": 150000,
    "wifi": 1,
    "vac": 1,
    "univer": 1,
    "grocer": 0
}
```



### Пример ответа

```javascript
{
    "current_page": 1,
    "data": [
        {
            "id": 3,
            "photo_url": "https://avatars.mds.yandex.net/get-pdb/251121/1413888d-3932-4cbd-8e20-e51827e53ae4/s800",
            "is_like": "{}",
            "district_name": "Алмалинский район",
            "address": "Тимирязева 56a",
            "price": 90000,
            "room_amount": 4,
            "city_name": "Алматы",
            "like_amount": 1
        },
        {
            "id": 4,
            "photo_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr4NdTHlJyPgYFY8xhjN0NOGmnHm9u_vtqxzYWpYPdFvvTxrlU2g",
            "is_like": "{}",
            "district_name": "Ауэзовский район",
            "address": "Фурманова 155",
            "price": 90000,
            "room_amount": 1,
            "city_name": "Алматы",
            "like_amount": 3
        }
    ],
    "first_page_url": "http://127.0.0.1:8000/api/ads/search?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http://127.0.0.1:8000/api/ads/search?page=1",
    "next_page_url": null,
    "path": "http://127.0.0.1:8000/api/ads/search",
    "per_page": 10,
    "prev_page_url": null,
    "to": 2,
    "total": 2
}
```
 

##2
## Регистрация нового пользователя
___
```POST api/registration ``` 

### Пример запроса


```javascript
{
	"first_name": "Данияр",
	"last_name": "Исламгалиев",
	"avatar_url": "http://avatar.jpg",
	"email": "email@gmail.com",
	"role": 1,
	"password": "iitu2017"
}
```
где:

| Имя        | Тип(Валидация)      | Описание  |
| ------------- |-----| ---------
| first_name | required,string,max:255  |  Имя пользователя|
| last_name  | required,string,max:255  |  Фамилия пользователя |
| avatar_url | max:255  |  Аватарка пользователя|
| email      | required,string,email,max:255,unique:users |  email пользователя |
| role       | required,integer     |  При выборе роли присваивать ему цифру 0 или 1|
| password   |required,string,min:6 |  Пароль пользователя|


### Пример ответа

```javascript
{
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMxZDFmNzRiODQ4ODgyYmU2M2U0NjgyY2MyNTg0NDRlNDI5MTQ0ZTZlMjg3MTM0MDdiNTNmMmE4NTM0YmY1MzExNGRiMTQxZTdjNTg1ZjJhIn0.eyJhdWQiOiIyIiwianRpIjoiYzFkMWY3NGI4NDg4ODJiZTYzZTQ2ODJjYzI1ODQ0NGU0MjkxNDRlNmUyODcxMzQwN2I1M2YyYTg1MzRiZjUzMTE0ZGIxNDFlN2M1ODVmMmEiLCJpYXQiOjE1MjAyNjc0MjksIm5iZiI6MTUyMDI2NzQyOSwiZXhwIjoxNTUxODAzNDI5LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.L2okeS-Xx3d-twcmlFiimsupD5CMEImQ4R3fuZZUSpdyFVEimCQ7-89aZpMfDq61iItF8vod_7QVS8HaXzNelj9w8ZFYjFsT4sGL01NzOa7gHB6Va9BTbfar3fngUioavtKEZUBSV9VyVNVY1T31risbMARcZdXZm2GJM5CNzza7pPiBaq25QgcfWxl1HrwFCT1VsxF9MH9ZNu71ILz8v9TnEAemt74J26T1Qwl6e8f41ne1f7ZCQ2N5DrMP1CS96dfCtpcd0lT9_TEJpK9djGsJdZWOEBW_HxSTixUgd00l7Z00-fvRzE6UwaJ-rjvb2LqzaErgL0uqiQxuYrzRLFjqWpup6d8rxERYynuj2PXB6TI6tcdOlJR7Gxy0yt4teikUfdeSsjR7Po3iAuYfxPJiUeNwubvuNn5rNmlGdBXPnO7CAnbRdZqC43qhBla-1eMjOlfHReJpsBnb-DQn0gWPvZ0vrwy3CF0kGE9Msjrlx3i8TBTG102p3BC2NcoiggKsOWy-mrhluCrpelIyDtxbr6a0o3xEtBmBVdZ9XfK3NaykhKtVS3UhRXCDRQMis_7rJ5w9AbbVFdtMPKfDzQRIWPqdg4I5TtJT1SwxHRZ3wtZ2FKUVUR2J9KR9iO7UluY5R_ThB1mEUSLr8RG8wZ5YrAS6_7I295f8kZX_ds0",
    "refresh_token": "def50200d99b303b118e3f6437e03217ee06cb19966a78897c93715192b7459f7ec873b80eb66cda65bb55234002b370d2415c5d5047afc864cac8765e91785d00fd5b5b57445d8a092723a59c390dd196025340ac4c5095fc25f92f8901fbdce2c4db1412f257d150462dc72779b0809fd867d348c5ce52f5a84ceac662ba144dc9688a4b6201313b0b18549151d224d1812122024d48429b4f3a5573f0fc5b6f7a0eee6d0c27a3fa4416b6b5f88084bf495362097bdb4407b1e42b2fb56999f57d689870625a49eb155c85c916a10b1d752ad6b0e91201ab336d00c38d30fe99a3b733ed971820b560767c6c48a5b36eef923e16180aaf02dece90efe676fa26bc2c6508d31ca22cd5af0e791242078354109885b7eae8c47de9707f9860921668527e3ddd38b53b3d0834fadfa001d8e41547ed08bc85f7ee0a21af9faa08ba21f744272ef7a02992f56c57c11e5611cf2f1a773852e2ae0848faf68971c95dff0d82"
}

```


##3
##Вход в систему

___
```POST /oauth/token ``` 

### Пример запроса
```
{
	client_id: 2,
	client_secret: 0u7bfUmsJP2aL4aEWxKp4HWW3tlORqxDtUKELRa6,
	grant_type: 'password',
	username: 'test@gmail.com',
	password: 'secret',
	scope: '*'
}
```

где:

| Имя        | Тип(Валидация)      | Описание  |
| ------------- |-----| -----------|
| client_id    | integer |  Всегда равно 2 |
| client_secret| integer |  Ключ берётся из базы, таблица: oauth_clients |
| username     | string  |  Email пользователя|
| password     | string  |  Пароль пользователя |
| scope        | required|  Всегда равно '*' |
| grant_type   | required|  Всегда password|


### Пример ответа

```javascript
{
    "token_type": "Bearer",
    "expires_in": 31536000,
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMxZDFmNzRiODQ4ODgyYmU2M2U0NjgyY2MyNTg0NDRlNDI5MTQ0ZTZlMjg3MTM0MDdiNTNmMmE4NTM0YmY1MzExNGRiMTQxZTdjNTg1ZjJhIn0.eyJhdWQiOiIyIiwianRpIjoiYzFkMWY3NGI4NDg4ODJiZTYzZTQ2ODJjYzI1ODQ0NGU0MjkxNDRlNmUyODcxMzQwN2I1M2YyYTg1MzRiZjUzMTE0ZGIxNDFlN2M1ODVmMmEiLCJpYXQiOjE1MjAyNjc0MjksIm5iZiI6MTUyMDI2NzQyOSwiZXhwIjoxNTUxODAzNDI5LCJzdWIiOiIxIiwic2NvcGVzIjpbIioiXX0.L2okeS-Xx3d-twcmlFiimsupD5CMEImQ4R3fuZZUSpdyFVEimCQ7-89aZpMfDq61iItF8vod_7QVS8HaXzNelj9w8ZFYjFsT4sGL01NzOa7gHB6Va9BTbfar3fngUioavtKEZUBSV9VyVNVY1T31risbMARcZdXZm2GJM5CNzza7pPiBaq25QgcfWxl1HrwFCT1VsxF9MH9ZNu71ILz8v9TnEAemt74J26T1Qwl6e8f41ne1f7ZCQ2N5DrMP1CS96dfCtpcd0lT9_TEJpK9djGsJdZWOEBW_HxSTixUgd00l7Z00-fvRzE6UwaJ-rjvb2LqzaErgL0uqiQxuYrzRLFjqWpup6d8rxERYynuj2PXB6TI6tcdOlJR7Gxy0yt4teikUfdeSsjR7Po3iAuYfxPJiUeNwubvuNn5rNmlGdBXPnO7CAnbRdZqC43qhBla-1eMjOlfHReJpsBnb-DQn0gWPvZ0vrwy3CF0kGE9Msjrlx3i8TBTG102p3BC2NcoiggKsOWy-mrhluCrpelIyDtxbr6a0o3xEtBmBVdZ9XfK3NaykhKtVS3UhRXCDRQMis_7rJ5w9AbbVFdtMPKfDzQRIWPqdg4I5TtJT1SwxHRZ3wtZ2FKUVUR2J9KR9iO7UluY5R_ThB1mEUSLr8RG8wZ5YrAS6_7I295f8kZX_ds0",
    "refresh_token": "def50200d99b303b118e3f6437e03217ee06cb19966a78897c93715192b7459f7ec873b80eb66cda65bb55234002b370d2415c5d5047afc864cac8765e91785d00fd5b5b57445d8a092723a59c390dd196025340ac4c5095fc25f92f8901fbdce2c4db1412f257d150462dc72779b0809fd867d348c5ce52f5a84ceac662ba144dc9688a4b6201313b0b18549151d224d1812122024d48429b4f3a5573f0fc5b6f7a0eee6d0c27a3fa4416b6b5f88084bf495362097bdb4407b1e42b2fb56999f57d689870625a49eb155c85c916a10b1d752ad6b0e91201ab336d00c38d30fe99a3b733ed971820b560767c6c48a5b36eef923e16180aaf02dece90efe676fa26bc2c6508d31ca22cd5af0e791242078354109885b7eae8c47de9707f9860921668527e3ddd38b53b3d0834fadfa001d8e41547ed08bc85f7ee0a21af9faa08ba21f744272ef7a02992f56c57c11e5611cf2f1a773852e2ae0848faf68971c95dff0d82"
}

```


##4
## Список всех регионов вместе с Астаной и Алматой

___
```GET api/regions ``` 

### Описание

Нужно стучаться к данному апи, и он вам выдаст в JSON формате все регионы, включая Алмату и Астану

### Пример ответа

```Javascript
[
    {
        "id": 1,
        "text": "Алматы",
        "region_name": "Алматы",
        "latitude": "43.2859",
        "longitude": "76.9129",
        "zoom": 11
    },
    {
        "id": 2,
        "text": "Астана",
        "region_name": "Астана",
        "latitude": "51.1583",
        "longitude": "71.4314",
        "zoom": 11
    },
    {
        "id": 3,
        "text": "Акмолинская обл.",
        "region_name": "Акмолинская обл.",
        "latitude": "52.1358",
        "longitude": "70.0004",
        "zoom": 6
    },
]
```

где:



| Имя         | Тип     | Описание  |
| ------------|-------| -----------|
| id          | integer |  ID региона , ID фиксированный, хранится в базе|
| text        | string  |  Text, попросили front-endеры , зачем нужно, хз... |
| region_name | string  |  Название региона, города |
| latitude    | numeric |  Координата(долгота) региона|
| longitude   | numeric |  Координата(широта) региона |
| zoom        | integer |  Зум карты при наведении на регион|



##5
## Список всех городов регионов или райнов Астаны и Алматы

___
```GET api/cities/{region_id} ```

где ```region_id``` - id региона

### Пример ответа

```javascript
[
    {
        "id": 5,
        "text": "Актобе",
        "city_name": "Актобе",
        "is_big_city": true,
        "latitude": "50.2828",
        "longitude": "57.1908",
        "zoom": 12
    }
]
```

### Другой пример

```javascript
[
    {
        "id": 1,
        "text": "Алатауский район",
        "district_name": "Алатауский район",
        "latitude": "43.2813",
        "longitude": "76.852",
        "zoom": 13
    },
    {
        "id": 2,
        "text": "Алмалинский район",
        "district_name": "Алмалинский район",
        "latitude": "43.2611",
        "longitude": "76.8945",
        "zoom": 13
    },
    {
        "id": 3,
        "text": "Ауэзовский район",
        "district_name": "Ауэзовский район",
        "latitude": "43.2409",
        "longitude": "76.839",
        "zoom": 13
    },
    {
        "id": 4,
        "text": "Бостандыкский район",
        "district_name": "Бостандыкский район",
        "latitude": "43.2134",
        "longitude": "76.888",
        "zoom": 13
    },
]
```

где:
 

| Имя          | Тип     | Описание  |
| ------------ |-------| -----------|
| id           | integer |  ID города/района , ID фиксированный, хранится в базе|
| text         | string  |  Text, попросили front-endеры , зачем нужно, хз... |
| district_name| string  |  Название района |
| city_name    | string  |  Название города |
| is_big_city  | boolean |  Возвращает true, если город большой |
| latitude     | numeric |  Координата(долгота) района/города|
| longitude    | numeric |  Координата(широта) района/города |
| zoom         | integer |  Зум карты при наведении на района/города|


##6
## Получение полной информации объявления
___
```GET api/ad/{ad_id}```

где ```ad_id``` - id объявления

### Пример запроса

http://82.196.15.23:8000:8000/api/ad/1

### Ответ

```javascript
{
    "main_data": {
        "id": 1,
        "like_amount": 2,
        "created_at": null,
        "address": "Жинис 551",
        "floor": 3,
        "total_floor": 5,
        "longitude": "56.2132131231",
        "latitude": "43.341241241242",
        "region_name": "Акмолинская обл.",
        "city_name": "Астана",
        "district_name": "Есильский район",
        "room_amount": 2,
        "bathroom_amount": 1,
        "beds_amount": 1,
        "house_type": 1,
        "house_area": 90,
        "price": 190000
    },
    "comforts": {
        "home_phone": false,
        "wifi": true,
        "cupboard": false,
        "plastic_win": true,
        "tv": true,
        "washer": false,
        "lift": false,
        "kitchenware": false,
        "iron": false,
        "cabel_tv": false,
        "parking_place": false,
        "domofon": false,
        "security": false,
        "gate": true,
        "street_lighting": false,
        "fen": false,
        "shower_cabin": false,
        "bath": false,
        "dryer": false,
        "vac": false
    },
    "nears": {
        "univer": true,
        "grocer": false,
        "school": true,
        "playschool": true,
        "hospital": true,
        "sport_complex": false,
        "mart": true,
        "pharmacy": false
    },
    "photos": [
        {
            "photo_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQF4tsczGYW8d9rXO0PQFX2ZCW5Dprn61hd2GbqcCgvjmt3IcaJ"
        },
        {
            "photo_url": "http://www.kvsspb.ru/upload/img/s_otdelkoy/janino/8.jpg"
        }
    ],
    "is_like": false,
    "respond": []
}

```


##7
## Поставить лайк на объявление
___
```POST api/like/ad/{ad_id}```

где ```ad_id``` - id объявления

Лайк на объявление могут поставить только авторизированные пользователи.

### Ответ 
```javascript
{
    "is_like": true
}
```

Иначе, если пользователь не авторизирован ответ будет таков:

```javascript
{
    "error": {
        "message": "Unauthenticated."
    }
}
```


##8
## Добавить объявление. Статус 0.
Доступно только авторизированным пользователям, а именно арендодателям.
___
```POST api/ad/```

### Описание

Пользователь заполняет основную информацию об аренде, после чего переходит на следующий степ. В это время в базу добавляется объявление со статусом уже 1, и с основной информацией.

### Пример тело запроса 

```javascript
{
	house_area:120
	room_amount:4
	bathroom_amount:1
	beds_amount:3
	house_type:0
	price:150000
}
```

где:

| Имя          | Тип     | Описание  |
| ------------ |-------| -----------|
| house_area   | required,integer| Площадь жилья|
| room_amount  | required,integer |  Количество комант |
| bathroom_amount| required,integer|  Количество ванной комнаты|
| beds_amount    | required,integer|  Количество кроватей |
| house_type  | required,integer|  Тип жилья |
| price     | required,integer|  Цена жилья|


### Пример ответа

```javascript
{
	success: {
		id: 1,
		status_code : 201,	
	} 
}
```

где:

```id``` - id объявления



##9
## Добавить объявление. Статус 1.
Доступно только авторизированным пользователям, а именно арендодателям.
___
```POST api/ad/{ad_id}/1```

### Описание

Пользователь переходит на следующий стейдж, где заполняет информацию о местоположения жилья и какие места есть рядом с жильем. После заполнения информации, объявлению присваивается статус 2.


### Пример тело запроса 

```javascript
{
	country_id:1,
	region_id:3
	city_id:1,
	district_id: 2,
	address:Самал 85/a,
	latitude:43.25654,
	longitude:76.412412,
	floor:1,
	total_floor:4,
	sport_complex:1,
	grocer:0,
	mart:1,
	hospital:0,
	school:1,
	pharmacy:1,
	playschool:1,
	univer:1,
}
```

где:

* ```country_id``` - ```required ``` , ```integer``` id страны
* ```region_id``` - ```integer```, id региона, у Алматы и Астаны region_id = 0
* ```city_id``` -  ```required ``` , ```integer``` id города
* ```district_id``` - ```integer``` id района, у городов, кроме Астаны и Алматы district_id= 0
* ```address``` - ```required ``` , ```string``` адрес жилья
* ```floor``` - ```integer ``` , этаж жилья
* ```total_floor``` - ```integer ``` , сколько всего этажей
* ```latitude``` - ```numeric``` долгота жилья
* ```longitude``` - ```numeric``` широта жилья
* ```sport_complex``` - ```required ```, ```boolean``` спортивный комплекс
* ```mart``` - ```required ```, ```boolean``` ТРЦ
* ```grocer``` - ```required ```, ```boolean``` продуктовый магазин
* ```hospital``` - ```required ```, ```boolean``` больница
* ```school``` - ```required ```, ```boolean``` школа
* ```pharmacy``` - ```required ```, ```boolean``` аптека
* ```playschool``` - ```required ```, ```boolean``` детский сад
* ```univer``` - ```required ```, ```boolean``` университет

### Успешный ответ

```javascript
{
	success: {
		id: 1,
		status_code : 201,	
	} 
}
```

##10
## Добавить объявление. Статус 2.
Доступно только авторизированным пользователям, а именно арендодателям.
___
```POST api/ad/{ad_id}/2```

### Описание

Пользователь переходит на следующий стейдж, где заполняет информацию о комфортах, которые есть у жилья. После заполнения информации, объявлению присваивается статус 3.


### Пример тело запроса 

```javascript
{
	"wifi": 1,
	"lift": 1,
	"cupboard": 1,
	"kitchenware": 1,
 	"iron": 1,
	"tv": 1,
	"cabel_tv": 1,
	"plastic_win": 1,
	"home_phone": 0,
	"parking_place": 0,
	"security": 1,
	"gate": 1,
	"street_lighting": 1,
	"washer": 0,
	"fen": 1,
	"domofon": 1,
	"shower_cabin": 1,
	"bath": 0,
	"dryer": 1,
	"vac": 1,
}
```

где:

*   ```wifi``` - ```required```, ```boolean```, wi-fi 
*	```lift``` - ```required```, ```boolean```, двуспальная кровать
*	```cupboard``` - ```required```, ```boolean```, шкаф
*	```kitchenware``` - ```required```, ```boolean```, кухонные принадлежности
*	```iron``` - ```required```, ```boolean```, утюг
*	```tv``` - ```required```, ```boolean```, телевизор
*	```cabel_tv``` - ```required```, ```boolean```, кабельное телевидение
*	```plastic_win``` - ```required```, ```boolean```, пластиковые окна
*	```home_phone``` - ```required```, ```boolean```, домашний телефон
*	```parking_place``` - ```required```, ```boolean```, парковочные места
*	```security``` - ```required```, ```boolean```, охрана
*	```gate``` - ```required```, ```boolean```, шлагбаум
*	```street_lighting``` - ```required```, ```boolean```, уличное освещение
*	```washer``` - ```required```, ```boolean```, стиральная машина
*	```fen``` - ```required```, ```boolean```, фен
*	```domofon``` - ```required```, ```boolean```, домофон
*	```shower_cabin``` - ```required```, ```boolean```, душевая кабина
*	```bath``` - ```required```, ```boolean```, ванная комната
*	```dryer``` - ```required```, ```boolean```, сушилка
*	```vac``` - ```required```, ```boolean```, пылесос

### Ответ

```javascript
{
	success: {
		id: 1,
		status_code : 201,	
	} 
}
```


##11
## Завершающая стадия подачи объявления. Статус 3.
Доступно только авторизированным пользователям, а именно арендодателям.
___
```POST api/ad/{ad_id}/3```

Пользователь закидывает фотографии и видео.

### Пример запроса


```javascript
{
  "photo_urls": ["https://pp.userapi.com/c540100/v540100982/4dadasdasdsadasdassada.jpg", "https://pp.userapi.com/c540100/выфв/47c67/dsadasdasdadas.jpg", "https://pp.userapi.com/c635100/v635100334/13aвфы83/MYd_cu2DIm8.jpg"]
 
}
```

где:

*	```photo_urls``` - ```required|array```, фотографии,
*	```video_url``` - ```string```, видео,

##12
## API для проверки текущего статуса объявления

## Описание

Данное API предназначена для определения текущего статуса объявления у пользователя(арендатора). При нажатии кнопки, вы обращаетесь к данному API и он вам даст ответ. Подробное описание ниже

___
```POST api/ad/status/check```

### Пример 

Если у пользователя нет незаконченных объявлений, то ему придет следующий ответ:

```javascript
{
    "data": null
}
```

Иначе(обратите внимание, что статус у объявления сейчас 3):

```javascript
{
    "data": {
        "status": 3,
        "main_data": {
            "id": 1,
            "user_id": 1,
            "status": 3,
            "like_amount": 1,
            "created_at": "2018-03-09 09:01:55",
            "updated_at": "2018-03-09 09:01:55",
            "ad_id": 1,
            "room_amount": 4,
            "bathroom_amount": 2,
            "beds_amount": 3,
            "house_type": 0,
            "house_area": 120,
            "price": 140000
        },
        "place": {
            "id": 6,
            "user_id": 1,
            "status": 3,
            "like_amount": 1,
            "created_at": null,
            "updated_at": null,
            "ad_id": 1,
            "country_id": 1,
            "region_id": 0,
            "city_id": 1,
            "district_id": 6,
            "address": "Самал 85/a",
            "floor": 1,
            "total_floor": 4,
            "latitude": "43.2283",
            "longitude": "76.9586",
            "region_name": null,
            "type": 3,
            "zoom": 13,
            "city_name": "Алматы",
            "is_big_city": true,
            "district_name": "Медеуский район"
        },
        "nears": {
            "univer": true,
            "grocer": false,
            "school": true,
            "playschool": true,
            "hospital": true,
            "sport_complex": true,
            "mart": true,
            "pharmacy": true
        },
        "comforts": {
            "home_phone": true,
            "wifi": true,
            "cupboard": false,
            "plastic_win": true,
            "tv": true,
            "washer": true,
            "lift": false,
            "kitchenware": true,
            "iron": true,
            "cabel_tv": true,
            "parking_place": true,
            "domofon": false,
            "security": false,
            "gate": true,
            "street_lighting": true,
            "fen": true,
            "shower_cabin": true,
            "bath": true,
            "dryer": true,
            "vac": true
        }
    }
}
```

##13
###### Подать заявку на объявление арендататором.

___
```POST api/renter/respond/ad/{ad_id}/```

где ```ad_id``` - id объявление


###Описание 

Подать заявку могут только зарегистрированные арендаторы. 

### Ответ

```javascript
{
    "status": 0
}
```

##14
###### Одобрить заявку арендадатора и отклонить другие заявки.

___
```POST api/landlord/respond/approve/{ad_id}/{user_id}```

где ```ad_id``` - id объявления, ```user_id``` - id пользователя

###Описание

Одобрить заявку могут только зарегистрированные арендадатели.

###Ответ

```javascript
{
    "approve_ad": true
}
```


##15
###### Просмотр всех заявок от арендадаторов.

___
```GET api/landlord/responds/{ad_id}/ ```

```ad_id``` - id объявления

### Описание

Каждый арендадатель может просмотреть, кто подал на определенное его объявление заявку. 

### Пример ответа

```javascript
{
    "users": [
        {
            "email": "test3@gmail.com",
            "status": -1
        },
        {
            "email": "test4@gmail.com",
            "status": 1
        },
        {
            "email": "test5@gmail.com",
            "status": -1
        }
    ]
}
```


##16
###### Просмотр всех объявлении, на которые были поданы заявки арендадатором.

___
```GET api/renter/responds/all```

### Описание 

Каждый зарегистрированный арендадатор можем просмотреть, на какие объявления он падал заявки и их статусы.
 

### Пример ответа

```javascript
[
    {
        "id": 1,
        "address": "Жинис 551",
        "status": 0,
        "room_amount": 2,
        "price": 190000,
        "updated_at": "2018-03-13 15:46:28"
    },
    {
        "id": 2,
        "address": "Абая 55",
        "status": -1,
        "room_amount": 3,
        "price": 80000,
        "updated_at": null
    },
    {
        "id": 3,
        "address": "Тимирязева 56a",
        "status": 0,
        "room_amount": 4,
        "price": 70000,
        "updated_at": null
    },
]
```

##17

###### Получить всю информацию о пользователе.
___
```GET api/user/info```

### Описание 

Вы получите всю информацию о пользователе, отправив только ваш ```token```.


### Пример ответа для арендатора

```javascript
[
    {
        "id": 4,
        "avatar_url": "/upload/opopopo.jpg",
        "first_name": "Daniyar",
        "last_name": "Askarov",
        "email": "test3@gmail.com",
        "phone_number": "87474324907",
        "dob": "1997-03-19",
        "role": 0,
        "sex": 0,
        "activity": 1,
        "family_status": 1,
        "smoking": 1
    }
]
```

### Пример ответа для арендадателя

```javascript
[
    {
        "id": 7,
        "avatar_url": null,
        "first_name": "Aidos",
        "last_name": "Adema",
        "role": 1,
        "email": "aidos@gmail.com",
        "phone_number": "34567",
        "dob": "1990-01-01",
        "sex": 0
    }
]
```

##18

###### Заполнить анкету арендатора.
___
```POST api/renter/info```


### Описание

Арендатор может заполнить анкету. 

### Пример запроса

```javascipt
{
    "first_name": "Danik",
    "last_name": "Krasavchik",
    "phone_number": "87474324907",
    "dob": "1997/08/20",
    "sex": 2,
    "activity": 1,
    "family_status": 1,
    "smoking": 1
    "avatar_url": "/upload/opopopo.jpg"
}

```

где:


| Имя            | Тип     | Описание  |
| ------------   |-------  | -----------|
| phone_number   | required, string| Номер телефона пользователя|
| dob            | required, date  |  Дата рождения(Y-m-d) отправляете стрингом|
| sex            | required,integer|  Пол   |
| activity       | required,integer|  Занятость |
| family_status  | required,integer|  Семейное положение |
| smoking        | required,integer|  Отношение к курению|
| avatar_url     | string, max 255 |  Аватар пользователя|
| first_name     | required,string |  Имя|
| last_name      | required,string |  Фамилия|


### Пример ответа

```javascript
{
    "success": {
        "id": 4,
        "status_code": 201
    }
}
```

 где ```id``` id пользователя.


##19
###### Получить все объявления арендадателя.
___

```GET api/landlord/ads/all```

При запросе отправляете токена пользователя.

### Пример ответа

```javascript
[
    {
        "id": 2,
        "room_amount": 3,
        "address": "Абая 125",
        "updated_at": null,
        "status": 4,
        "photo_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHgIzwcnpaqwvfLL8MnzHQxGe-Zc1qyNoTxWdZabLJfp6faV4E"
    },
    {
        "id": 4,
        "room_amount": 1,
        "address": "Фурманова 155",
        "updated_at": null,
        "status": 4,
        "photo_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQr4NdTHlJyPgYFY8xhjN0NOGmnHm9u_vtqxzYWpYPdFvvTxrlU2g"
    },
    {
        "id": 6,
        "room_amount": 3,
        "address": "Наурызбай батыра 15",
        "updated_at": null,
        "status": 4,
        "photo_url": "https://i.ytimg.com/vi/zYYBm57zMfQ/maxresdefault.jpg"
    },
    {
        "id": 7,
        "room_amount": 4,
        "address": "Абая 55",
        "updated_at": null,
        "status": 4,
        "photo_url": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzAFwPX9HjAY4xcDIYY7OUBC3du2JQCD_EBJR954mEGXQvjKX3"
    }
]
```

##20

###### Заполнить анкету арендадателя.
___
```POST api/landlord/info```


### Описание

Арендадатель также заполняет небольшую информацию о себе. 

### Пример запроса

```javascipt
{
    "first_name": "Danik",
    "last_name": "Krasavchik",
    "phone_number": "87474324907",
    "dob": "1997/08/20",
    "avatar_url": "/upload/opopopo.jpg"
}

```

где:


| Имя            | Тип     | Описание  |
| ------------   |-------  | -----------|
| phone_number   | required, string| Номер телефона пользователя|
| dob            | required, date  |  Дата рождения(Y-m-d) отправляете стрингом|
| sex            | integer|  Пол   |
| avatar_url     | string, max 255 |  Аватар пользователя|
| first_name     | required,string |  Имя|
| last_name      | required,string |  Фамилия|