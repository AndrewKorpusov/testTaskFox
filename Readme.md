For test script you should run:

``composer install`` \
``symfony server:start``

Then send POST request to endpoint: 

`http://{yourLocalUrl}/build-route`

with header ``Content-type: application/json``
and JSON body



```
[{
            "transportNumber" : "45B",
            "departure" : "Porto",
            "arrival" : "Barcelona",
            "seat" : "4A",
            "type" : "flight"
        },{
            "transportNumber" : "44B",
            "departure" : "Lviv",
            "arrival" : "Paris",
            "seat" : "4A",
            "type" : "flight"
        },{
            "transportNumber" : "44B",
            "departure" : "Kyiv",
            "arrival" : "Porto",
            "baggageTicket":"132",
            "seat" : "4A",
            "type" : "flight"
        },{
            "transportNumber" : "123",
            "departure" : "Barcelona",
            "arrival" : "Lviv",
            "seat" : "41b",
            "type" : "bus"
        },{
            "transportNumber" : "45B",
            "departure" : "Porto",
            "arrival" : "New York",
            "baggageTicket" : "355",
            "gate" : "4B",
            "type" : "flight"
        },{
            "transportNumber" : "14B",
            "departure" : "Paris",
            "arrival" : "Porto",
            "seat" : "4A",
            "type" : "train"
        },{
            "transportNumber" : "55B",
            "departure" : "New York",
            "arrival" : "Porto",
            "seat" : "4A",
            "type" : "train"
        }]
```
