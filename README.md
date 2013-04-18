# ADB HTTP Server
An HTTP API for issuing ADB commands (sort of). Only `adb install` where the APK is a URI is supported at the moment.

__WARNING Do not install this on a live server connected to the Internet. There are major security flaws.__
__This is intended for local use only. K Thanks.__


# Installation

Modify the $apk_folder and $adb_command variables at the top of settings.php to suit your needs.  Then POST or GET the following parameters.

- op: The adb operation you want to perform. Only install currently supported.
- apk_uri: The URIs of the APKs you want to install.  You can batch the installation by separating URIs with commas. 

To get this working correctly on my Raspberry Pi I had to add `www-data ALL=(ALL) NOPASSWD: ALL` to my /etc/sudoers file.  This allows PHP to sudo with when issuing the adb command.  There's a bunch of better ways this could be solved, suggestions are welcome. Relevant Stack Overflow threads [here](http://stackoverflow.com/questions/5652986/php-sudo-in-shell-exec) and [here](http://stackoverflow.com/questions/5510284/adb-devices-command-not-working).


# Examples

http://raspberrypi.local/AdbHttpServer/index.php?q=install&params=http://raspberrypi.local:5984/apk/68da1bf0f1a3829d1afaafacbd001821/com.ka-lite-browser.apk


