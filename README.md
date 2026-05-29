# MiniInsta 📸
Site PHP servi par Apache via Docker.

## Lancer le site
```bash
docker run -d -p 8080:80 --name mini_insta wakatp/mini_insta
```
Visiter **http://localhost:8080**

## Arrêter et nettoyer
```bash
docker stop mini_insta
docker rm mini_insta
docker rmi wakatp/mini_insta
```

## Sans Docker
```bash
git clone https://github.com/WakaTP-B/MiniInsta.git
cd MiniInsta
php -S localhost:8080
```
Visiter **http://localhost:8080**