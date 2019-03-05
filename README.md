A custom module for [verdepieno.com](https://www.verdepieno.com).

## How to install
```
bin/magento maintenance:enable
composer clear-cache
composer require verdepieno/core:*
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f en_US de_DE it_IT --area adminhtml --theme Magento/backend && bin/magento setup:static-content:deploy -f en_US de_DE it_IT  --area frontend --theme thebell/thebell4
bin/magento maintenance:disable
```

## How to upgrade
```
bin/magento maintenance:enable
composer clear-cache && composer update verdepieno/core
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code && bin/magento setup:di:compile
rm -rf pub/static/* && bin/magento setup:static-content:deploy -f en_US de_DE it_IT --area adminhtml --theme Magento/backend && bin/magento setup:static-content:deploy -f en_US de_DE it_IT  --area frontend --theme thebell/thebell4
bin/magento maintenance:disable
```

If you have problems with these commands, please check the [detailed instruction](https://mage2.pro/t/263).