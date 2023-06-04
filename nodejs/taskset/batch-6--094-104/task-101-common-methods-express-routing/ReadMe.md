- Test

```bash
$ curl -L localhost:3000/redirect -I
HTTP/1.1 302 Found
X-Powered-By: Express
Location: https://google.com
Vary: Accept
Content-Type: text/plain; charset=utf-8
Content-Length: 40
Date: Mon, 30 May 2022 16:22:38 GMT
Connection: keep-alive
Keep-Alive: timeout=5

HTTP/2 301 
location: https://www.google.com/
content-type: text/html; charset=UTF-8
date: Mon, 30 May 2022 16:22:39 GMT
expires: Wed, 29 Jun 2022 16:22:39 GMT
cache-control: public, max-age=2592000
server: gws
content-length: 220
x-xss-protection: 0
x-frame-options: SAMEORIGIN
alt-svc: h3=":443"; ma=2592000,h3-29=":443"; ma=2592000,h3-Q050=":443"; ma=2592000,h3-Q046=":443"; ma=2592000,h3-Q043=":443"; ma=2592000,quic=":443"; ma=2592000; v="46,43"

HTTP/2 200 
content-type: text/html; charset=ISO-8859-1
p3p: CP="This is not a P3P policy! See g.co/p3phelp for more info."
date: Mon, 30 May 2022 16:22:39 GMT
server: gws
x-xss-protection: 0
x-frame-options: SAMEORIGIN
expires: Mon, 30 May 2022 16:22:39 GMT
cache-control: private
set-cookie: 1P_JAR=2022-05-30-16; expires=Wed, 29-Jun-2022 16:22:39 GMT; path=/; domain=.google.com; Secure
```