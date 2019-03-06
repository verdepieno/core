A custom module for [verdepieno.com](https://www.verdepieno.com).

## How to install
```
php70 bin/magento maintenance:enable
php70 ~/composer clear-cache
php70 ~/composer require verdepieno/core:*
php70 bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && php70 bin/magento setup:di:compile
rm -rf pub/static/* && php70 bin/magento setup:static-content:deploy -f en_US de_DE it_IT --area adminhtml --theme Magento/backend && php70 bin/magento setup:static-content:deploy -f en_US de_DE it_IT  --area frontend --theme thebell/thebell4
php70 bin/magento maintenance:disable
```

## How to upgrade
```
php70 bin/magento maintenance:enable
php70 ~/composer clear-cache && composer update verdepieno/core
php70 bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && php70 bin/magento setup:di:compile
rm -rf pub/static/* && php70 bin/magento setup:static-content:deploy -f en_US de_DE it_IT --area adminhtml --theme Magento/backend && php70 bin/magento setup:static-content:deploy -f en_US de_DE it_IT  --area frontend --theme thebell/thebell4
php70 bin/magento maintenance:disable
```

If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).