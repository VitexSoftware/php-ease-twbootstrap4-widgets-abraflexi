clean:
	rm -rf debian/php-ease-twbootstrap4-widgets-flexibee
	rm -rf debian/php-ease-twbootstrap4-widgets-flexibee-doc
	rm -rf debian/*.log
	rm -rf debian/*.substvars
	rm -rf docs/*
	rm -rf vendor/* composer.lock

doc:
	VERSION=`cat debian/composer.json | grep version | awk -F'"' '{print $$4}'`; \
	php -f /usr/bin/apigen generate --source src --destination docs --title "php-ease-twbootstrap4-widgets-flexibee ${VERSION}" --charset UTF-8 --access-levels public --access-levels protected --php --tree

phpunit:
	composer update
	phpunit --bootstrap tests/bootstrap.php

changelog:
	VERSION=`cat debian/composer.json | grep version | awk -F'"' '{print $$4}'`; \
	CHANGES=`git log -n 1 | tail -n+5` ; dch -b -v $${VERSION} --package php-ease-twbootstrap4-widgets-flexibee "$(CHANGES)"

deb: changelog
	dpkg-buildpackage -A -us -uc

rpm:
	rpmdev-bumpspec --comment="Build" --userstring="Vítězslav Dvořák <info@vitexsoftware.cz>" php-ease-twbootstrap4-widgets-flexibee.spec
	rpmbuild -ba php-ease-twbootstrap4-widgets-flexibee.spec

verup:
	git commit debian/composer.json debian/version debian/revision  -m "`cat debian/version`-`cat debian/revision`"
	git push origin master

.PHONY : install
	
