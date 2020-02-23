<?php


namespace DiSpace\YandexSTT\Yandex;


/**
 * Interface ParamsInterface
 * @package DiSpace\YandexSTT\Yandex
 */
interface SpeechParamsInterface
{
    public const FORMAT_OGG = 'oggopus';
    public const FORMAT_LPCM = 'lpcm';

    public const  SAMPLE_RH_48K = '48000';
    public const  SAMPLE_RH_16K = '16000';
    public const  SAMPLE_RH_8K = '8000';

    public const TOPIC_GENERAL = 'general';
    public const TOPIC_GENERAL_RC = 'general:rc';
    public const TOPIC_MAPS = 'maps';
    public const TOPIC_DATES = 'dates';
    public const TOPIC_NAMES = 'names';
    public const TOPIC_NUMBERS = 'numbers';

    public const LANG_RU = 'ru-RU';
    public const LANG_EN = 'en-US';
    public const LANG_TR = 'tr-TR';
}