<?php

/*
 * This is a helper function for broklyn-skeleton
 */

function getConfig()
{
    $config = array();

    $yamlParser = new \Symfony\Component\Yaml\Parser();
    $config['general'] = $yamlParser->parse(file_get_contents(BRO_CONFIG_DIR . "/config.yml") . "\n");

    return $config;
}