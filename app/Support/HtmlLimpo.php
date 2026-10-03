<?php

namespace App\Support;

class HtmlLimpo
{
    public static function limpar(?string $html): string
    {
        if (!$html) {
            return '';
        }

        // Mantém o negrito que vinha no style
        $html = preg_replace(
            '/<span[^>]*font-weight:\s*(bold|bolder|600|700)[^>]*>(.*?)<\/span>/is',
            '<strong>$2</strong>',
            $html
        );

        // Deixa só as tags permitidas
        $html = strip_tags($html, '<p><br><ul><ol><li><strong><b><em><i><a>');

        // Remove todos os atributos (style, class...)
        $html = preg_replace('/<(p|ul|ol|li|strong|b|em|i)\b[^>]*>/i', '<$1>', $html);
        $html = preg_replace('/<br\b[^>]*>/i', '<br>', $html);

        // Links: aceita só http/https
        $html = preg_replace_callback('/<a\b[^>]*>/i', function ($m) {
            preg_match('/href="(https?:\/\/[^"]+)"/i', $m[0], $h);

            return isset($h[1])
                ? '<a href="'.$h[1].'" target="_blank" rel="noopener noreferrer">'
                : '<a>';
        }, $html);

        // Transforma \r\n em <br>
        $html = preg_replace("/\r\n|\r|\n/", '<br>', $html);

        // Remove parágrafos vazios e <br> repetidos
        $html = preg_replace('#<p>\s*(<br>\s*)*</p>#i', '', $html);
        $html = preg_replace('#(<br>\s*){3,}#i', '<br><br>', $html);

        // Remove tags vazias como <ul></ul>, <p></p> e <strong><br></strong>
        do {
            $antes = $html;
            $html = preg_replace('#<(p|ul|ol|li|strong|em|b|i|span)>(\s|&nbsp;|<br\s*/?>)*</\1>#i', '', $html);
        } while ($html !== $antes);

        // Remove <br> sobrando no começo e no fim do texto
        $html = preg_replace('#^(\s*<br\s*/?>)+|(<br\s*/?>\s*)+$#i', '', trim($html));

        return trim(str_replace('&nbsp;', ' ', $html));
    }
}
