#!/bin/bash

cd ./web/uploads

optimize() {
  jpegoptim *.jpg -m70 --strip-all
  for i in *
  do
    if test -d $i
    then
      cd $i
      echo $i
      optimize
      cd ..
    fi
  done
  echo
}

optimize

find -name '*.png' -print0 | xargs -0 optipng -nc -nb -o7

cd ../../

yui-compressor ./web/frontend/styles/main.src.css -o ./web/frontend/styles/main.css
yui-compressor ./web/frontend/styles/animate.src.css -o ./web/frontend/styles/animate.css
yui-compressor ./web/frontend/styles/dark-bottom.src.css -o ./web/frontend/styles/dark-bottom.css
yui-compressor ./web/frontend/styles/slick.src.css -o ./web/frontend/styles/slick.css
yui-compressor ./web/frontend/styles/social-likes_birman.src.css -o ./web/frontend/styles/social-likes_birman.css

yui-compressor ./web/frontend/bower_components/modernizr/modernizr.src.js -o ./web/frontend/bower_components/modernizr/modernizr.js
yui-compressor ./web/frontend/scripts/SidebarTransitions/sidebarEffects.src.js -o ./web/frontend/scripts/SidebarTransitions/sidebarEffects.js
yui-compressor ./web/frontend/scripts/jquery.event.frame.src.js -o ./web/frontend/scripts/jquery.event.frame.js
yui-compressor ./web/assets/ad7cc493/jquery.js -o ./web/assets/ad7cc493/jquery.js
yui-compressor ./web/assets/ca0fe4a4/yii.js -o ./web/assets/ca0fe4a4/yii.js