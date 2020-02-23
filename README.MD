## О пакете?

Пакет реализовывает распознание речи из коротких аудио-файлов через сервис Yandex SpeechKit для PHP.

Ограничения накладываемые Яндексом
* Максимальный размер файла — 1 МБ
* Максимальная длительность — 30 секунд
* Максимальное количество аудиоканалов — 1

ВНИМАНИЕ! Сервис Yandex SpeechKit платный!
Подробнее о тарифах можно ознакомиться на этой странице
https://cloud.yandex.ru/docs/speechkit/pricing#rules-stt-short

## Установка

**Composer**

Добавить зависимость через Сomposer

```shell 
   composer require di-space/yandex-stt
```

## Использование

Для начала вам нужно создать аккаунт в Яндекс Облаке и получить ваш IAM-TOKEN

Подробнее о вариантах получении тоукена можно узнать в документации SpeechKit https://cloud.yandex.ru/docs/speechkit/concepts/auth

В случае, если вы будете передавать пользовательский, а не сервисный тоукен - вам так же потребуется Ваш Идентификатор Каталога(folderID)

### Упрощённый вариант

Импортировать YandexSTT

```php 
   use DiSpace\YandexSTT\YandexSTT;
```

Для удобства ввода дополнительных параметров можно импортировать интерфейс SpeechParamsInterface

```php 
   use DiSpace\YandexSTT\Request\SpeechParamsInterface;
```

Создание запроса из пути к аудио-файлу. В результате вернётся строка с распознаным текстом.
Внимание, если не задавать дополнительных параметров, то ожидаемый формат файла OggOpus https://wiki.xiph.org/OggOpus

```php 
   YandexSTT::getTextByAudioFilePath('<путь к файлу>', '<IAM-TOKEN>');
```

Дополнительный параметры передаются в виде массива
```php 
    YandexSTT::getTextByAudioFilePath('<путь к файлу>', '<IAM-TOKEN>', [
        'format' => SpeechRequestInterface::FORMAT_OGG,
        'lang' => SpeechRequestInterface::LANG_RU
    ]);
```
##### Доступные параметры

`format` - Формат файла. Варианты **SpeechRequestInterface::FORMAT_OGG** или **SpeechRequestInterface::FORMAT_LPCM**

`lang` - Язык. Варианты **SpeechRequestInterface::LANG_RU**, **SpeechRequestInterface::LANG_EN** и **SpeechRequestInterface::LANG_TR**

***
Если ваш тоукен получен для пользовательского, а не сервисного аккаунта, то вам нужно передать четвёртым параметром ваш идентификатор каталога(folderID).
```php 
   YandexSTT::getTextByAudioFilePath('<путь к файлу>', '<IAM-TOKEN>', [], '<folderId>');
```
***
Так же можно передать содержимое аудио-файла напрямую с помощью метода getTextByAudioDirect. Параметры аналогичный getTextByAudioFilePath

```php 
   YandexSTT::getTextByAudioDirect('<бинарное содержимое аудио-файла>', '<IAM-TOKEN>', [<массив дополнительных параметров>], ['folderId']);
```
### Продвинутый вариант использования

```
Документация будет добавлена позже...
```