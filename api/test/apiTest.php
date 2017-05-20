<?php

// cd /public_html/monkey/api/
// vendor/bin/phpunit test/apiTest.php

require __DIR__ . "/../databaseController.php";
//require 'PHPUnit/Autoload.php';
require 'vendor/autoload.php';

class apiTest extends PHPUnit_Framework_TestCase {
    /*public function testTest() {
        $something = true;
        $this->assertTrue($something);
    }*/

    public function testGetAll() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.226.128/~user/monkey/api/events/');

        $this->assertEquals($res->getStatusCode(), 200);
        $this->assertEquals($res->getHeaderLine('content-type'), "application/json");

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

        $all = json_encode($events, JSON_PRETTY_PRINT);
        $allfromcall = (string) $res->getBody();

        $this->assertEquals($all, $allfromcall);
    }

    public function testGetByID() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.226.128/~user/monkey/api/events/1');

        $this->assertEquals($res->getStatusCode(), 200);
        $this->assertEquals($res->getHeaderLine('content-type'), "application/json");

        $event1 = array();

        $event1[0] = new StdClass();
        $event1[0]->id = "1";
        $event1[0]->name = "Wereld Apen Dag";
        $event1[0]->personid = "5";
        $event1[0]->startdate = "2015-12-11";
        $event1[0]->enddate = "2016-12-20";

        $event = json_encode($event1,JSON_PRETTY_PRINT);
        $eventfromcall = (string) $res->getBody();

        $this->assertEquals($event, $eventfromcall);
    }

    public function testGetByPersonID() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.226.128/~user/monkey/api/events/person/5');

        $this->assertEquals($res->getStatusCode(), 200);
        $this->assertEquals($res->getHeaderLine('content-type'), "application/json");

        $events = array();

        $events[0] = new StdClass();
        $events[0]->id = "1";
        $events[0]->name = "Wereld Apen Dag";
        $events[0]->personid = "5";
        $events[0]->startdate = "2015-12-11";
        $events[0]->enddate = "2016-12-20";

        $events[1] = new StdClass();
        $events[1]->id = "4";
        $events[1]->name = "Puppy Day";
        $events[1]->personid = "5";
        $events[1]->startdate = "2016-01-01";
        $events[1]->enddate = "2017-01-01";

        $events = json_encode($events, JSON_PRETTY_PRINT);
        $eventsfromcall = (string) $res->getBody();

        $this->assertEquals($events, $eventsfromcall);
    }

    public function testGetBetweenDates() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.226.128/~user/monkey/api/events/byDate/?from=2017-01-01&until=2017-12-30');

        $this->assertEquals($res->getStatusCode(), 200);
        $this->assertEquals($res->getHeaderLine('content-type'), "application/json");

        $events = array();

        $events[0] = new StdClass();
        $events[0]->id = "2";
        $events[0]->name = "Morgenland";
        $events[0]->personid = "4";
        $events[0]->startdate = "2017-01-15";
        $events[0]->enddate = "2017-01-17";

        $events[1] = new StdClass();
        $events[1]->id = "3";
        $events[1]->name = "Wow Koel!";
        $events[1]->personid = "6";
        $events[1]->startdate = "2017-05-05";
        $events[1]->enddate = "2017-03-22";

        $expectedEvents = json_encode($events, JSON_PRETTY_PRINT);
        $eventsfromcall = (string) $res->getBody();

        $this->assertEquals($expectedEvents, $eventsfromcall);
    }

    public function testGetByPersonIDAndDates() {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', 'http://192.168.226.128/~user/monkey/api/events/person/5/byDate/?from=2015-12-30&until=2017-12-30');

        $this->assertEquals($res->getStatusCode(), 200);
        $this->assertEquals($res->getHeaderLine('content-type'), "application/json");

        $events = array();

        $events[0] = new StdClass();
        $events[0]->id = "4";
        $events[0]->name = "Puppy Day";
        $events[0]->personid = "5";
        $events[0]->startdate = "2016-01-01";
        $events[0]->enddate = "2017-01-01";

        $expectedEvents = json_encode($events, JSON_PRETTY_PRINT);
        $eventsfromcall = (string) $res->getBody();

        $this->assertEquals($expectedEvents, $eventsfromcall);
    }
}