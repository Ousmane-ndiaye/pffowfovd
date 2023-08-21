<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\TwigFilter;
use Twig\Extension\AbstractExtension;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Intl\Locales;
use Twig\TwigFunction;
use App\Entity\Usersecteur;

class AppExtension extends AbstractExtension
{
    private $entityManager;
    private $localeCodes;
    private $locales;

    public function __construct(EntityManagerInterface $entManager, string $locales)
    {
        $this->entityManager = $entManager;
        $localeCodes = explode('|', $locales);
        sort($localeCodes);
        $this->localeCodes = $localeCodes;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('format_string', [$this, 'formatString']),
            new TwigFilter('json_decode', [$this, 'jsonDecode']),
            new TwigFilter('string_month', [$this, 'stringMonth']),
            new TwigFilter('in_secteur', [$this, 'verifUserSecteur']),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('locales', [$this, 'getLocales']),
        ];
    }

    public function formatString($date, $format = "%e %B")
    {
        if ($date instanceof \DateTime) {
            $date = $date->getTimestamp();
        }

        return strftime($format, $date);
    }

    public function jsonDecode($data)
    {
        return json_decode($data);
    }

    public function stringMonth($numMois)
    {
        $key = intval($numMois);
        $mois = [1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'];
        $stringMonth = '';
        if (array_key_exists($key, $mois)) {
            $stringMonth = $mois[$key];
        }

        return $stringMonth;
    }

    public function verifUserSecteur($arg, $idUser)
    {
        $userSecteur = $this->entityManager->getRepository(Usersecteur::class)->findOneBy(['secteur' => $arg, 'user' => $idUser]);
        return $userSecteur ? 1 : 0;
    }

    /**
     * Takes the list of codes of the locales (languages) enabled in the
     * application and returns an array with the name of each locale written
     * in its own language (e.g. English, Français, Español, etc.).
     */
    public function getLocales(): array
    {
        if (null !== $this->locales) {
            return $this->locales;
        }

        $this->locales = [];
        foreach ($this->localeCodes as $localeCode) {
            $this->locales[] = ['code' => $localeCode, 'name' => Locales::getName($localeCode, $localeCode)];
        }

        return $this->locales;
    }
}
