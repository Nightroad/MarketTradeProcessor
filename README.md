Market Trade Processor
Author: Bartosz Turkot

Used 3rd party programs:
- Composer: managing libraries and dependencies
- Twig: Django/Python style template engine for frontend pages
- ExtJS framework: for viewing consumed messages in message frontend
- NodeJS+Socket.IO: for first approach to message frontend (unused at the moment)

The simple engine of this application is written by me, I tried to keep it as much lightweight as possible for
better performance. It starts with index.php in the root folder.

The application is capable of running either from web server and command line interface and both have a different
action resolvers to handle requests. For example:

- message consumer and frontend are using the ModRewriteRegexpActionResolver which is a configurable mechanism that
  matches the URL pattern to hardcoded map to can keep fancy URLs like /index.html or /consumer for
  handling requests and easily extend the site map in future.

- the test request for message consumer is handled by CliActionResolver which can be called from any shell like:
  php index.php feed

  The parameter is a action that is handled by the resolver.
  The "feed" test uses CURL PHP implementation to submit the JSON message to the consumer.

The application is capable of running at the multiple environment with different params, as you can see in
Shared\Config.php
At the moment I'm using the "developer" configuration on workstation and production which differs on database
connection and debug information. Obviously we don't want anyone to see PHP errors on released servers at any
corner cases we did not predicted :)

Assumptions and implementation details:
- I decided to go for MySQL as a persistence layer for consumed messages and I used just PDO
  for contacting with database.

- The messages are considered as RAW POST input, instead of standard PHP array object for $_POST['field'] as written in:
  https://docs.google.com/document/d/1st5i5OpravXYhXBZry8qZwP-ish-ZfQQcSOBduKf73k/edit#heading=h.3z9nxxdx658o

  So the script reads from php://input for JSON string.
  You can see it in Shared/BasicFunctions.php

- for currencyFrom and currencyTo I assume and validate them with ISO4217 which is a standard for 3-char currency
  formats, so the currency like XXX will be considered invalid. For originatingCountry I also compare
  it with ISO3166-1 ALPHA2 which is 2-char country code.


Unused code:

There is also unused code in this application (like MessageProcessor/Server) which is the first attempt in my frontend
solution. I wanted to use NodeJS and socket.IO for interactive charts with Chart.js. Unfortunately I'm on business
trip in a foreign country this week and will be back on friday. So I'm very short on spare time to deep dive in NodeJS
and implement approach I wanted to take when I started this app.