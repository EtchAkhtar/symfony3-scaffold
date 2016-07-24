### Update entity class and repository

php bin/console doctrine:generate:entities AppBundle/Entity/Demo

### Update without backing up

php bin/console doctrine:generate:entities AppBundle/Entity/Demo --no-backup

### See what updating db schema will run

php bin/console doctrine:schema:update --dump-sql

### Update db schema

php bin/console doctrine:schema:update --force

