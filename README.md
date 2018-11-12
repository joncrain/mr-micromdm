# MicroMDM module

```php
composer require joncrain/mr-micromdm
```

This will be the middleware and webhook for a MicroMDM instance. Right now it functions by talking to some [custom middleware](https://joncrain.github.io/2018/11/08/micromdm_munki_partiii.html) for MicroMDM. 

Need to add in the ability to create and store DeviceLock/EraseDevice codes as well.

## Commands to support

Not sure if all of these are needed, but it'd be nice to have a config to turn them on or off:

### Simple Commands to Add
These commands do not pass in any extra json:
* ~~restart device~~
* ~~security info~~
* available os updates
* certificate list
* installed application list
* os update status
* profile list
* provisioning profile list
* security info
* shutdown device

### Phase II: Complex Commands
Other commands are a little more complex and it would be nice to have a call for data entry (i.e. to set pin code). Not quite sure how to do this.

* device information
    * Queries
* device lock/erase device (going to want some more auth on these?)
    * pin 
* install/remove application/profile (I don't think this is viable)
* schedule os update
    * product key
    * install action (selectable)
* schedule os update scan
    * force
* settings application configuration

## Input Data

Need to setup the ability to intake the webhook from micromdm. That's a lot of json data, not sure how to best handle it...

One thought is to create a table just for the webhook data and tie back to the MMDM table on UDID.
