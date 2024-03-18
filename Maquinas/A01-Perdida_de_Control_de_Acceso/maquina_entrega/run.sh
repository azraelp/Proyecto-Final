#!/usr/bin/env bash
docker rm web1
docker build -f Dockerfile -t php-web7-4 .
docker run -p 80:80 -d --name web1 php-web7-4
