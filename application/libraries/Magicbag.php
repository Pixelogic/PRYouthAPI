<?php

/**
* Magicbag
* @pixelogic Omar Melendez
*/
class Magicbag
{
    public static function getFriends($fb)
    {
        $AyFbFriendRank     = new AyFbFriendRank($fb);
        
        // Get user top friends
        $friends = $AyFbFriendRank->getFriends();

        // Get friends meta data.
        foreach ($friends as $friend) {
            
        }

        return $friends;
    }
}