#!/bin/bash

#ставим весь необходимый софт
apt-get update
apt-get install git-core nodejs npm curl phpmyadmin
#конфигурим pma на /phpmyadmin
ln -s /etc/phpmyadmin/apache.conf /etc/apache2/sites-enabled/pma.conf
#подключаем ModRewrite к апачу
ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
service apache2 restart
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
#ставим нужные библиотеки
php composer.phar install
cd bash
ln -s $PWD/amethyst-ws.conf /etc/apache2/sites-enabled/amethyst-ws.conf
ln -s $PWD/aw-deploy.sh ~/aw-deploy.sh
source deploy.sh
cd ../web/assets/js/libraries
bower install --allow-root jquery
bower install --allow-root noty
bower install --allow-root malihu-custom-scrollbar-plugin
npm i jquery.inputmask