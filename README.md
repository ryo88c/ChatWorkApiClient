# ChatWork Api Client

This is [ChatWork API](http://developer.chatwork.com/ja/) Client by [BEAR.Sunday](https://github.com/bearsunday/BEAR.Sunday).

## How to use ChatWork API

1. [Apply to get API token.](https://www.chatwork.com/service/packages/chatwork/subpackages/api/apply_beta.php)
1. Add `CHATWORK_API_TOKEN = "xxxxxxxx"` on `.env`

## Run on console.

```
$ php bootstrap/api.php get /rooms
```

## Run on the built-in web server.

```
$ php -S 0.0.0.0:8080 bootstrap/api.php
$ curl http://localhost:8080/rooms
```
