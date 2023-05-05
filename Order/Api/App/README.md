1. composer install
2. Ha doctrinnel db-t kezelsz, a config mappa alatt ne felejtsd el beállítani, hol lesznek az entitásaid. (Infrastructure/Persistance alé kerülnek majd)
3. Commandokat és queryket symfony messengerbe küldjük be. HandleTrait használatát a ExampleControllerben láthatod.
4. Az index a localhost:8587


# Commands
* php bin/console doctrine:database:drop --force
* php bin/console doctrine:database:create
* php bin/console doctrine:migrations:diff
* php bin/console doctrine:migrations:migrate
* php bin/console doctrine:fixtures:load
