# Документация к ROOME API

### Общая информация



#### Каждое объявление имеет свой статус

###### Статус: -1. Это означает, что объявление неактивировано.
###### Статус: 0. На этой стадии пользователь добавляет объявление и его общую 
###### информацию.
###### Статус: 1. Пользовател добавляет информацию о местоположении жилья.
###### Статус: 2. На этой стадии пользователь добавляет информацию о комфорте 
###### жилья.
###### Статус: 3. Пользователь добавляет фотографии и видео.
###### Статус: 4. Данный статус означает, что объявление активно.


#### Авторизированные пользователи имеют свою роль.


###### Арендодатель: 1.
###### Арендатор: 0.


#### Каждое жилье имеет тип.

###### Квартира: 0.
###### Комната: 1.
###### Дом: 2.


### Заявка на объявление, которая подается арендадатором имеет статус

###### 0: Заявка в ожидании
###### 1: Заявка одобрена
###### -1: Заявка отклонена

### У каждого пользователя есть анкета, в которой хранятся данные:

##### Пол
| Cтатус     |    Описание  |
| -----------| ---------
| 0          |  Не указано  |
| 1          |  Мужской     |
| 2          |  Женский     |

##### Занятость
| Cтатус     |    Описание  |
| -----------| ---------
| 0          |  Не указано  |
| 1          |  Работаю     |
| 2          |  Учусь       |


##### Семейное положение
| Cтатус     |    Описание           |
| -----------| ---------
| 0          |  Не указано           |
| 1          |  Не женат/ Не замужем |
| 2          |  Женат/замужем	     |
 


##### Отношение к курению
| Cтатус     |    Описание      |
| -----------| ---------
| 0          |  Не указано      |
| 1          |  Резко негативное|
| 2          |  Негативное      |
| 3          |  Нейтральное     |
| 4          |  Положительное   |

Документация по всем API лежит в api_descriptions.md



