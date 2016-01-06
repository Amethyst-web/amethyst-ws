#!/bin/bash
git pull origin master
lessc --clean-css ../web/assets/css/style.less ../web/assets/css/style.min.css