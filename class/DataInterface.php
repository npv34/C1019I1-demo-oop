<?php


namespace Controller;


interface DataInterface
{
    function readDataFile();
    function saveDataToFile($data);
}