<?php


namespace App\Adaptors;

use App\User;

class Adaptor
{
    public function getUserBySocId($user, string $socName)
    {
        $userInSystem = User::query()
            ->where('id_in_soc', $user->id)
            ->where('type_auth', $socName)
            ->first();
        if(is_null($userInSystem)){
            $userInSystem = new User();
            switch ($socName){
                case 'vk':
                    $userInSystem->fill([
                    'email' => $user->accessTokenResponseBody['email']
                        ]);
                    break;
                case 'github':
                    $userInSystem->fill([
                        'email' => $user->getEmail(),
                    ]);
                    break;
                default:
                    $userInSystem->fill([
                        'email' => 'no@email',
                    ]);
            }
            $userInSystem->fill([
                'name' => $user->getName() ?? '',
                'password' => 'no_password',
                'id_in_soc' => $user->getId() ?? '',
                'type_auth' => $socName,
                'avatar' => $user->getAvatar() ?? '',
            ]);
            $userInSystem->save();
        }
        return $userInSystem;
    }
}
