<?php

namespace App\Services;

class Slug
{
    public static function normalize(string $slug): string
    {
        // Replaces accented characters with their unaccented versions.
        $slug = preg_replace("/[áàãâä]/u", "a", $slug);
        $slug = preg_replace("/[ÁÀÃÂÄ]/u", "A", $slug);
        $slug = preg_replace("/[éèêë]/u", "e", $slug);
        $slug = preg_replace("/[ÉÈÊË]/u", "E", $slug);
        $slug = preg_replace("/[íìîï]/u", "i", $slug);
        $slug = preg_replace("/[ÍÌÎÏ]/u", "I", $slug);
        $slug = preg_replace("/[óòõôö]/u", "o", $slug);
        $slug = preg_replace("/[ÓÒÕÔÖ]/u", "O", $slug);
        $slug = preg_replace("/[úùûü]/u", "u", $slug);
        $slug = preg_replace("/[ÚÙÛÜ]/u", "U", $slug);
        $slug = preg_replace("/[ñ]/u", "n", $slug);
        $slug = preg_replace("/[Ñ]/u", "N", $slug);
        $slug = preg_replace("/[ç]/u", "c", $slug);
        $slug = preg_replace("/[Ç]/u", "C", $slug);
        $slug = preg_replace("/[&]/u", "e", $slug);

        // Convert to lowercase
        $slug = strtolower($slug);

        // Replaces non-alphanumeric characters or spaces with hyphens, avoiding two consecutive hyphens.
        $slug = preg_replace("/[^a-zA-Z0-9]+/", "-", $slug);

        // Remove duplicate hyphens
        $slug = preg_replace("/-+/", "-", $slug);

        // Remove hyphens at the beginning and end
        $slug = trim($slug, '-');

        return $slug;
    }
}
