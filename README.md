# Laravel project Milan Van Trimpont

## Voorwaarden om dit project te kunnen runnen.

Voordat je begint, zorg ervoor dat je de volgende tools hebt geïnstalleerd:

- **PHP** (minimaal versie 8.1)
- **Composer** (voor het beheren van PHP-afhankelijkheden)
- **Node.js** (minimaal versie 16.x)
- **Yarn** (voor het beheren van front-end afhankelijkheden)
- **MySQL** of een andere database naar keuze
- **WSL** (Windows Subsystem for Linux) voor een Linux-achtige omgeving op Windows

## Stappen om het project op te zetten

### 1. Clone het project

Clone het project naar je lokale machine door het volgende commando uit te voeren:

```bash
git clone https://github.com/milanVanTrimpont/backend_web_laravel.git
```

### 2. Installeer PHP-afhankelijkheden

Gebruik Composer om de PHP-afhankelijkheden van het project te installeren:

```bash
composer install
```

### 3. Installeer Node.js en Yarn

Zorg ervoor dat je Node.js en Yarn hebt geïnstalleerd in je WSL-omgeving. Als je Yarn nog niet hebt geïnstalleerd, kun je dat doen door de volgende commando's uit te voeren:

```bash
sudo apt update
sudo apt install curl
curl -sL https://deb.nodesource.com/setup_16.x | sudo -E bash -
sudo apt install -y nodejs
sudo npm install -g yarn
```
Controleer of Yarn correct is geïnstalleerd:
```bash
yarn --version
```
### 4. Installeer front-end afhankelijkheden
Nu moet je de front-end afhankelijkheden installeren met Yarn:
```bash
yarn install
```
### 5. start het project op
ga naar de root in je wsl omgeving en type:
```bash
code backedn_web_laravel
```
### 6. Database connectie + data toevoegen
Stel de juiste databasegegevens in het .env bestand in, zoals je databasegebruikersnaam, wachtwoord en database naam. 
Voer de migraties uit om de database aan te maken en de benodigde tabellen te genereren:
```bash
php artisan migrate
```
Seed de database met behulp van de artisan-opdracht. Voer het volgende commando uit om de seeders te runnen en de dummy data in je tabellen te laden:
```bash
php artisan db:seed
```
Moest dit niet werken kan je ook elke class manueel toevoegen.
```bash
php artisan db:seed --class=NaamVanSeeder
```

### 9. Start de development server
Nu kun je de Laravel-development server starten:
```bash
php artisan serve
```

### Bouw de front-end assets
Als je wijzigingen hebt aangebracht in de front-end bestanden of de eerste keer de front-end assets wilt bouwen, kun je het volgende commando uitvoeren:
```bash
yarn dev
```
Dit zal de assets bouwen voor de development omgeving. Als je klaar bent met de productieversie, kun je het volgende uitvoeren:
```bash
yarn build
```
### Nu ben je klaar om mijn project te bekijken

## bronvermelding
Ik heb enkele problemen met het tonen van mijn berichten met chatgpt omdat er foto's in voorkomen en chatgpt dit niet ondersteunt.
![image](https://github.com/user-attachments/assets/25a25b12-7ac3-423a-8ac8-4ee68e07055c)

profielpagina --https://chatgpt.com/share/678ac767-2468-8007-b38b-68e89cf2f2b9 <br>
kledingItems en faq --https://chatgpt.com/share/678ac8af-4700-8007-af98-e2b0c5e70be6 <br>
contact/mail https://www.youtube.com/watch?v=xigpoxOW1MY&ab_channel=MattSocha <br>
js faq https://www.youtube.com/watch?v=ioa8T4tA4zg&t=1s&ab_channel=NickBabich <br>
profielen bewerken --https://chatgpt.com/share/678ac8e3-625c-8007-8b81-21fed92d3ee8 https://chatgpt.com/share/678ac903-8a78-8007-9035-92f88a790142 <br>
