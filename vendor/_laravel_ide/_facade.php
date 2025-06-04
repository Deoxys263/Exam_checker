<?php

namespace Illuminate\Support\Facades;

interface Auth
{
    /**
     * @return \App\Models\frontend\Student|false
     */
    public static function loginUsingId(mixed $id, bool $remember = false);

    /**
     * @return \App\Models\frontend\Student|false
     */
    public static function onceUsingId(mixed $id);

    /**
     * @return \App\Models\frontend\Student|null
     */
    public static function getUser();

    /**
     * @return \App\Models\frontend\Student
     */
    public static function authenticate();

    /**
     * @return \App\Models\frontend\Student|null
     */
    public static function user();

    /**
     * @return \App\Models\frontend\Student|null
     */
    public static function logoutOtherDevices(string $password);

    /**
     * @return \App\Models\frontend\Student
     */
    public static function getLastAttempted();
}