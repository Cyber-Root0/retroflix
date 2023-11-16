<?php

namespace Retroflix\interfaces;
interface LoginInterface{

    public function login(string $username, string $password);
    public function logout();
    public function isLoggedIn();
    public function redirect(string $url);

}