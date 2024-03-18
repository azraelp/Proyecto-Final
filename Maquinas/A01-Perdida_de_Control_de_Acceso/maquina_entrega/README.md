# Using the Docker image in production

We're going to show how to use GitHub and the GitHub Docker Package repository to build a Docker image with your application code. 

You need to:
* [Duplicate this repository](https://help.github.com/en/github/creating-cloning-and-archiving-repositories/duplicating-a-repository)
* Put your application code in the `/src` folder.
* Modify `/.github/workflows/main.yml` and change `username: khromov` to `username: <your GitHub username>`.
* Push your changes.
* GitHub should build a Docker image for you and push it to `docker.pkg.github.com/<your username>/php-wp-docker/php-wp-docker:master`
* Now you can pull the image and run it in any way you want. For example if you just want top start the image, you can run: `docker run -p 8080:80 docker.pkg.github.com/khromov/php-wp-docker/php-wp-docker:master`

### Runing just the Apache/PHP image without docker-compose

```
docker pull docker.pkg.github.com/khromov/php-wp-docker/php-wp-docker:master
docker run -p 8080:80 -v /your-path-on-host/var/www/:/var/www/src php-wp-docker_php
```
