## Run php code sniffer
phpcs:
	vendor/bin/phpcs --standard=PSR2 ./src

phpcs-fix:
	vendor/bin/phpcbf --standSard=PSR2 ./src