# Installation steps:

> Pull the repository, make sure you have docker installed

> Open a terminal, cd where you pulled the repository 

> docker-compose build

> docker-compose up -d

> docker-compose exec virta_app bash

> composer install

> php artisan migrate --seed

> Open a browser and input: http://127.0.0.1:8000/

# Endpoints:
### Company
```
### Get company list
GET http://127.0.0.1:8000/api/company
Accept: application/json
```
```
### Create new company
POST http://127.0.0.1:8000/api/company
Content-Type: application/json
Accept: application/json

{
"parent_company_id": 1,
"name": "Company Name"
}
```
```
### Get company details
GET http://127.0.0.1:8000/api/company/2
Accept: application/json
```
```
### Partial Update company
PATCH http://127.0.0.1:8000/api/company/6
Content-Type: application/json
Accept: application/json

{
"name": "Modified Company name"
}
```
```
### Update company
PUT http://127.0.0.1:8000/api/company/6
Content-Type: application/json
Accept: application/json

{
"parent_company_id": 2,
"name": "Modified company name"
}
```
```
### Delete company
DELETE http://127.0.0.1:8000/api/company/8
Content-Type: application/json
Accept: application/json
```
### Station
```
### Get stations from distance and coords
POST http://127.0.0.1:8000/api/station/distance
Content-Type: application/json
Accept: application/json

{
"distance": 5,
"latitude": 44.502758,
"longitude": 25.989187,
"company_id": 2
}
```
```
### Get station details
GET http://127.0.0.1:8000/api/station
Accept: application/json
```
```
### Create new station
POST http://127.0.0.1:8000/api/station
Content-Type: application/json
Accept: application/json

{
"company_id": 3,
"name": "Station Name",
"latitude": 15.6232,
"longitude": 22.6441312,
"address": "Station Address"
}
```
```
### Get station details
GET http://127.0.0.1:8000/api/station/20
Accept: application/json
```
```
### Partial Update station
PATCH http://127.0.0.1:8000/api/station/20
Content-Type: application/json
Accept: application/json

{
"name": "Station modified name"
}
```
```
### Update station
PUT http://127.0.0.1:8000/api/station/20
Content-Type: application/json
Accept: application/json

{
"company_id": 3,
"name": "Station modified name",
"latitude": 12.12312,
"longitude": 12.12312,
"address": "Station modified address"
}
```
```
### Delete station
DELETE http://127.0.0.1:8000/api/station/20
Content-Type: application/json
Accept: application/json
```
