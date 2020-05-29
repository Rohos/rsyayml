# RsYaYml

A package for generating [Yandex YML](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html)

### 1. Installation
```bash
composer require rohos/rsyayml
```

### 2. Require:
```bash
"require": {
    "php": ">=7.1.0",
    "ext-dom": "*"
}
```

### 3. Offer types:
- OfferVendorModel ([Произвольный товар (vendor.model)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__vendor-model))
- OfferBook ([Книги (book)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__book))
- OfferAudioBook ([Аудиокниги (audiobook)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__audiobook))
- OfferArtistTitleAudio ([Музыкальная продукция (artist.title)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__artist-title))
- OfferArtistTitleVideo ([Видео продукция (artist.title)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__artist-title))
- OfferTour ([Туры (tour)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__tour))
- OfferEventTicket ([Билеты на мероприятие (event-ticket)](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__event-ticket))
- OfferSimple ([Упрощенное описание](https://yandex.ru/support/webmaster/goods-prices/technical-requirements.html#tag_11__base))

### 4. Example:
```php
$filePath = 'test.xml';
$yml = new RsYaYml($filePath);
$yml->createBaseShopElements(
    'PrinterShop',
    'ООО PrinterShop',
    'https://some-printer-shop-url.com'
);

$yml->addCategory(1, 'Принтеры');
$yml->addCategory(2, 'Струйные принтеры', 1);
$yml->addCurrency('RUR');

$yml->createFile();

$yml->addOffer(
    (new OfferVendorModel('id-1', true))
        ->setUrl('https://some-printer-shop-url.com/catalog/product-id-1')
        ->setPrice(200)
        ->setCurrencyId('RUR')
        ->setCategoryId(2)
        ->setDescription('Description')
        ->setModel('Deskjet D2663')
        ->setTypePrefix('Принтер')
        ->setSalesNote('Минимум 10')
        ->setManufacturerWarranty(true)
        ->setParam('Максимальный формат', 'А4')
        ->setParam('Количество страниц в месяц', 1000, 'стр')
        ->setDownloadable(true)
        ->setCountryOfOrigin('Россия')
        ->setVendor('Yandex')
        ->setVendorCode('CH366C')
        ->setDelivery(true)
        ->setDeliveryOptions(100)
);

$yml->saveFile();
```