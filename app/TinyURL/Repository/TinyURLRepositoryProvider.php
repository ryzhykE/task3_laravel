<?php
namespace TinyURL\Repository;
use illuminate\Support\ServiceProvider;

class TinyURLRepositoryProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('TinyURL\Repository\Link\DbLinkRepository', function(){
                return new \TinyURL\Repository\Link\DbLinkRepository(new \Link);
        });

        $this->app->bind('TinyURL\Repository\User\DbUserRepository', function(){
            return new \TinyURL\Repository\User\DbUserRepository(new \User);
        });

        $this->app->bind('\TinyURL\Repository\Link\LinkRepositoryInterface', '\TinyURL\Repository\Link\ShortLinkRepository');
    }

}

