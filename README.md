# php-vitexsoftware-ease-bootstrap4-widgets-flexibee
![Project Logo](https://raw.githubusercontent.com/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee/master/project-logo.png "Project Logo")

[![Build Status](https://travis-ci.org/VitexSoftware/Ease-PHP-Bricks.svg?branch=master)](https://travis-ci.org/VitexSoftware/Ease-PHP-Bricks)
[![GitHub stars](https://img.shields.io/github/stars/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee.svg)](https://github.com/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee/stargazers)
[![GitHub issues](https://img.shields.io/github/issues/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee.svg)](https://github.com/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee/issues)
[![GitHub license](https://img.shields.io/github/license/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee.svg)](https://github.com/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee/blob/master/LICENSE)
[![Twitter](https://img.shields.io/twitter/url/https/github.com/VitexSoftware/php-vitexsoftware-ease-bootstrap4-widgets-flexibee.svg?style=social)](https://twitter.com/intent/tweet?text=Wow:&url=https%3A%2F%2Fgithub.com%2FVitexSoftware%2Fphp-vitexsoftware-ease-bootstrap4-widgets-flexibee)

TwitterBootstrap4 Widgets for [php-flexibee](https://github.com/Spoje-NET/php-flexibee) Library for FlexiBee with EasePHP Framework widgets


Instalace
----------

    composer require vitexsoftware/ease-bootstrap4-widgets-flexibee

How to run ?
------------

1) composer install
2) cd src
3) modify config.php to use custom FlexiBee connection
4) open the project url in browser


### Co tady máme ?

# Třídy v AbraFlexi/Bricks/ui/TWB4:

| Soubor                                                           | Popis                                 |
| ---------------------------------------------------------------- | --------------------------------------|
| [StatusInfoBox](src/AbraFlexi/Bricks/ui/TWB4/StatusInfoBox.php) | Infostaus pripojeni k firme


Ukázky ve složce [Examples](Examples)
=====================================


Debian/Ubuntu
-------------

Pro Linux jsou k dispozici .deb balíčky. Prosím použijte repo:

    wget -O - http://v.s.cz/info@vitexsoftware.cz.gpg.key|sudo apt-key add -
    echo deb http://v.s.cz/ stable main > /etc/apt/sources.list.d/ease.list
    apt update
    apt install php-vitexsoftware-ease-bootstrap4-widgets-flexibee
