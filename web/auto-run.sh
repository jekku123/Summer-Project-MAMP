#!/bin/bash

echo -e "\033[0;32m[1/4] Dropping database"
bin/console doctrine:database:drop --force

echo -e "\033[0;32m[2/4] Creating database"
bin/console doctrine:database:create

echo -e "\033[0;32m[3/4] Migrating migrations"
bin/console doctrine:schema:update --force

echo -e "\033[0;32m[4/4] Loading fixtures"
bin/console doctrine:fixtures:load --no-interaction


echo -e "\033[1;37m___________________________________________________"
echo -e ""
echo -e "Database hopefully successfully up to date and populated with dummy-data!"
echo -e ""
echo -e "\033[1;37m___________________________________________________"
