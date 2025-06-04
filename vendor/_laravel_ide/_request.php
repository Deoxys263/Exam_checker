<?php

namespace Illuminate\Http;

interface Request
{
    /**
     * @return \App\Models\frontend\Student|null
     */
    public function user($guard = null);
}