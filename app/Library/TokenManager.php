<?php

namespace TradoLogic\Library;


class TokenManager
{

    public function check($token)
    {
        // For the sake of this demo, let's say every token works
        return true;
    }

    public function generateToken()
    {
        // Usually we need to assign it to a user now, but we won't :)
        return uniqid();
    }
}