<?php

namespace App\services;

class Censurator
{
    const MOT_TABOU = ['bite', 'couille', 'chatte', 'penis', 'terrorisme', 'minou' ];

    # Méthode qui permet de transformer les mots tabou en ****.
    public function purify(string $texte): string{
        //peut être fait en une ligne si on ne veut pas remplacer par un nombre précis d'*
        foreach(self::MOT_TABOU as $motTabou) {
            //autant d'* que de lettres dans le mot :
            $replacement = str_repeat("*", mb_strlen($motTabou));
            $texte = str_ireplace($motTabou, $replacement, $texte);
        }
        return $texte;
    }
}