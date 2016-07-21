<?php

namespace alaczi\Twig\Extension;

use Symfony\Component\Intl\Data\Provider\LocaleDataProvider;
use Symfony\Component\Intl\Intl;

/**
 * Simple class to implement a locale name twig filter
 * @package alaczi\Twig\Extension
 */
class LocaleNameExtension extends \Twig_Extension
{
    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('locale_name', array($this, 'localeNameFilter')),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function localeNameFilter($locale, $displayLocale = null)
    {
        $localeBundle =  Intl::getLocaleBundle();
        if ($localeBundle instanceof LocaleDataProvider) {
            $aliases = $localeBundle->getAliases();
            if (isset($aliases[$displayLocale])) {
                $displayLocale = $aliases[$displayLocale];
            }
        }
        $localeName = Intl::getLocaleBundle()->getLocaleName($locale, $displayLocale);
        return $localeName;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'locale_name_extension';
    }
}
