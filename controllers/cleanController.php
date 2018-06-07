<?php
class cleanController
{
    public function cleanUp($string) {
        $utf8 = array(
            '/[áàâãªäæå]/u'   =>   'a',
            '/[ÁÀÂÃÄÆÅ]/u'    =>   'A',
            '/[ÍÌÎÏ]/u'     =>   'I',
            '/[íìîï]/u'     =>   'i',
            '/[éèêë]/u'     =>   'e',
            '/[ÉÈÊË]/u'     =>   'E',
            '/[óòôõºöø]/u'   =>   'o',
            '/[ÓÒÔÕÖØ]/u'    =>   'O',
            '/[úùûü]/u'     =>   'u',
            '/[ÚÙÛÜ]/u'     =>   'U',
            '/ç/'           =>   'c',
            '/Ç/'           =>   'C',
            '/ñ/'           =>   'n',
            '/Ñ/'           =>   'N',
            '/–/'           =>   '-',
            '/[’‘‹›‚]/u'    =>   ' ',
            '/[“”«»„]/u'    =>   ' ',
            '/ /'           =>   ' ',
        );


        $string = preg_replace(array_keys($utf8), array_values($utf8), $string);


        return $string;
    }

}