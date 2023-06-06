# Summer Project

---

## Using the image

### Installation

```shell
git clone https://github.com/jekku123/summer-project
cd summer-project
cd web
composer install
npm install
docker-compose up --build
npm run watch
docker ps
docker exec -it <Fill me> /bin/sh
cd web
bin/console make:migration
bin/console doctrine:migrations:migrate
bin/console doctrine:fixtures:load --no-interaction
```
