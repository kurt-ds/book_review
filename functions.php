<?php

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}