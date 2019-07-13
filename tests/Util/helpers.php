<?php

/**
 * Just a small wrapper around factory()
 */
function create($class, $attributes = [], $number = null)
{
    return factory($class, $number)->create($attributes);
}
