# Summer Project

---

## Using the image

### Installation

```shell
git clone https://github.com/jekku123/summer-project
cd summer-project
cp .env.example .env && cp web/.env.example web/.env
composer install
npm install
docker-compose up --build
npm run watch
docker ps
docker exec -it <Fill me> /bin/sh
bin/console doctrine:fixtures:load
```

-   Symfony 6 will run on [http://localhost:8007](http://localhost:8007)
-   phpMyAdmin will run on [http://localhost:9082](http://localhost:9082)
