<?php

require __DIR__ . "/../databaseController.php";
require 'PHPUnit/Autoload.php';

class apiTest extends PHPUnit_Framework_TestCase {
    /*public function testTest() {
        $something = true;
        $this->assertTrue($something);
    }*/

    public function testGetAll() {
        $controller = new DBController();

        $events = array();
        $i = 0;

        $events[$i] = new StdClass();
        $events[$i]->id = "".($i+1);
        $events[$i]->name = "Wereld Apen Dag";
        $events[$i]->personid = "5";
        $events[$i]->startdate = "2015-12-11";
        $events[$i]->enddate = "2016-12-20";
        $i++;

        $events[$i] = new StdClass();
        $events[$i]->id = "".($i+1);
        $events[$i]->name = "Morgenland";
        $events[$i]->personid = "4";
        $events[$i]->startdate = "2017-01-15";
        $events[$i]->enddate = "2017-01-17";
        $i++;

        $events[$i] = new StdClass();
        $events[$i]->id = "".($i+1);
        $events[$i]->name = "Wow Koel!";
        $events[$i]->personid = "6";
        $events[$i]->startdate = "2017-05-05";
        $events[$i]->enddate = "2017-03-22";
        $i++;

        $events[$i] = new StdClass();
        $events[$i]->id = "".($i+1);
        $events[$i]->name = "Puppy Day";
        $events[$i]->personid = "5";
        $events[$i]->startdate = "2016-01-01";
        $events[$i]->enddate = "2017-01-01";
        $i++;

        $all = json_encode($events);
        $allfromcall = $controller->getAll();

        $this->assertEquals($all, $allfromcall);
    }

    public function testGetByID() {
        $controller = new DBController();

        $event1 = array();

        $event1[0] = new StdClass();
        $event1[0]->id = "1";
        $event1[0]->name = "Wereld Apen Dag";
        $event1[0]->personid = "5";
        $event1[0]->startdate = "2015-12-11";
        $event1[0]->enddate = "2016-12-20";

        $eventfromcall = $controller->getByID(1);

        $this->assertEquals(json_encode($event1), $eventfromcall);
    }
}