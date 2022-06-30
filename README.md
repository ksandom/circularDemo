# circularDemo

Showing that any number in a closed linked list will loop, and reproducing the result for how many will succeed.

Based on [this Veritasium video](https://www.youtube.com/watch?v=iSNsgj1OCLA).

## Proving that all numbers will be in a loop

This goes through every item in the list and makes sure that it is participating in a loop that will get back to itself.

The only parameter is how large the list is.

```
$ ./bin/circularDemo.php 100
min=1          max=56         average=11.2       total=100        fail      
$ ./bin/circularDemo.php 100
min=1          max=44         average=7.33       total=100        pass      
$ ./bin/circularDemo.php 100
min=1          max=78         average=11.14      total=100        fail      
$ ./bin/circularDemo.php 1000
min=1          max=393        average=49.13      total=1000       pass      
$ ./bin/circularDemo.php 1000
min=1          max=443        average=49.22      total=1000       pass      
$ ./bin/circularDemo.php 1000
min=1          max=382        average=38.2       total=1000       pass      
$ ./bin/circularDemo.php 1000
min=1          max=894        average=178.8      total=1000       fail      
$ ./bin/circularDemo.php 1000
min=1          max=697        average=77.44      total=1000       fail      
$ ./bin/circularDemo.php 1000
min=1          max=691        average=53.15      total=1000       fail      
$ ./bin/circularDemo.php 1000
min=1          max=409        average=58.43      total=1000       pass      
```

## Reproducing the result

This reproduces the result that about 31% of the time they should succeed.

```
$ ./bin/repeatedCircularDemo.php 100 1000
301/1000 = 30.1%
$ ./bin/repeatedCircularDemo.php 100 1000
328/1000 = 32.8%
$ ./bin/repeatedCircularDemo.php 100 1000
317/1000 = 31.7%
$ ./bin/repeatedCircularDemo.php 100 1000
306/1000 = 30.6%
$ ./bin/repeatedCircularDemo.php 100 1000
283/1000 = 28.3%
$ ./bin/repeatedCircularDemo.php 100 1000
298/1000 = 29.8%
$ ./bin/repeatedCircularDemo.php 100 1000
312/1000 = 31.2%
$ ./bin/repeatedCircularDemo.php 100 1000
312/1000 = 31.2%
$ ./bin/repeatedCircularDemo.php 100 1000
306/1000 = 30.6%
```

## Requirements

* PHP

It should work on Linux, Windows & MacOS. Although only Linux has been tested so far.

## Running it on Windows

This should work on Windows, but hasn't been tested. Just note that you'll need to switch slashes.

Eg

```
$ ./bin/repeatedCircularDemo.php 100 1000
```

becomes

```
$ .\bin\repeatedCircularDemo.php 100 1000
```

## Contributions

* PRs welcome.
* Check out [my other work](https://www.youtube.com/channel/UClPMAYH46sh4Qagj2ufQkYA), Eg [handWavey](https://www.youtube.com/watch?v=kCbar8w3Pws), which is really cool.
