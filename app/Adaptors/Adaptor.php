<?php


namespace App\Adaptors;

use App\User;
use SocialiteProviders\Manager\OAuth2\User as UserOAuth;
use tests\Mockery\Adapter\Phpunit\EmptyTestCase;

class Adaptor
{
    public function getUserBySocId(UserOAuth $user, string $socName)
    {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if(is_null($userInSystem)){
            $userInSystem = new User();
            $userInSystem->fill([
                'name' => $user->getName() ?? '',
                'email' => $user->accessTokenResponseBody['email'],
                'password' => '',
                'id_in_soc' => $user->getId() ?? '',
                'type_auth' => $socName,
                'avatar' => $user->getAvatar() ?? '',
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
