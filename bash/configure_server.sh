#!/bin/bash

#ставим весь необходимый софт
apt-get update
apt-get install git-core nodejs npm curl
#подключаем ModRewrite к апачу
ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
ln -s /usr/bin/nodejs /usr/bin/node
npm install -g bower
npm install -g less
npm install -g less-plugin-clean-css

#конфигурим git
git config --global user.email "neket313@gmail.com"
git config --global user.name "HEKET313"
git config --global color.ui true

#разворачиваем приложение
git clone git@github.com:Amethyst-web/amethyst-ws.git
cd amethyst-ws
#ставим композер
curl -sS https://getcomposer.org/installer | php
#ставим нужные библиотеки
php composer.phar install
cd bash
ln -s $PWD/aw-deploy.sh ~/aw-deploy.sh
source deploy.sh