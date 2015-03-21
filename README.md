textWolf
=============
A Twilio service granting users access to WolframAlpha via SMS.

Installation
-------
1. In /web/response.php, add Twilio...
  * AccountID
  * Authentication Token
  * Phone Number
2. In /web/wolfContact.php, add WolframAlpha appID
3. Launch textWolf on cloud platform such as Heroku
4. In your Twilio phone number management dashboard, set your desired phone-number's SMS 'Request-URL' to https://www.yourURL.com/response.php
