# Onion Omega PHP demo

Demo application for Omega PHP Extension

Check the presence of 4 expansions:
- Oled
- PWM
- Relay
- GPS

Check PHP and Omega module version

## Install on Omega device

Download the repo:
```
git clone https://github.com/kea/onion-omega-php-demo.git
```

Download idephix task automation tool:

```
cd onion-omega-php-demo
curl http://getidephix.com/idephix.phar > idephix.phar
```

Update file `idxrc.php` changing the device name `omega-XXXX.local`

Deploy this demo into your device:

```
php idephix.phar deploy --env=prod --go
```

Go to `http://omega-XXXX.local`, login and go to _Onion Omega PHP demo_ app 

## TODO

Add the single expansion view
