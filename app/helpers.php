<?php

function setActive(string $routeName) {
    return request()->routeIs($routeName) ? 'active' : ''; 
}