Na docker geinstalleerd te hebben run ik de volgende commandos om zowel mongodb als redis op te starten via een docker container/image.

sudo docker run --name mongoscript -d -p 27017:27017 mongo:4
sudo docker run --name redisscript -d -p 6379:6379 redis

