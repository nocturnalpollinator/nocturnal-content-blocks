<?php

foreach (glob(NOC_CBLOCK_THEME_CONTENT . '/*.php') as $layout) {
    require_once($layout);
}