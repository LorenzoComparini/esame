## BANCA DELLA TERRA

#### Configurazione client
```
cd client
npm install
yarn serve
```

#### Configurazione server

Tabella: lands

Modl: Land

Controller : LandController

Apis: 
- index
- detail
- create
- edit
- delete

```
cd server
composer upgrade
php artisan migrate
php artisan db:seed
php artisan serve
```
