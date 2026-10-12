# Guía de lanzamiento — Tiny Knack

Guía paso a paso para publicar **tinyknack.com** con **Hetzner + Laravel Forge + Cloudflare**, y después configurar **Search Console, Google Analytics 4 y Google AdSense**.

> Tiempo estimado: 2–3 horas para el lanzamiento + unos minutos para Analytics. AdSense requiere aprobación de Google (de días a algunas semanas).
> Los precios son aproximados: confírmalos al contratar.

---

## Índice

1. [Resumen y costos](#1-resumen-y-costos)
2. [Cuentas necesarias](#2-cuentas-necesarias)
3. [Registrar el dominio](#3-registrar-el-dominio-en-cloudflare)
4. [Subir el código a GitHub](#4-subir-el-código-a-github)
5. [Crear el servidor](#5-crear-el-servidor-hetzner-desde-forge)
6. [Crear el sitio y el primer deploy](#6-crear-el-sitio-en-forge)
7. [Conectar el dominio y el SSL](#7-dns-y-ssl-con-cloudflare)
8. [Configurar Cloudflare (caché y seguridad)](#8-configurar-cloudflare)
9. [Verificación final](#9-verificación-después-del-lanzamiento)
10. [Google Search Console y Bing](#10-google-search-console-y-bing)
11. [Google Analytics 4](#11-google-analytics-4)
12. [Google AdSense](#12-google-adsense)
13. [Mantenimiento y próximos deploys](#13-mantenimiento)
14. [Dar a conocer el sitio](#14-dar-a-conocer-el-sitio)

---

## 1. Resumen y costos

| Servicio | Para qué | Costo aproximado |
|---|---|---|
| Cloudflare Registrar | Dominio `tinyknack.com` (precio de costo, sin recargo) | ~US$10/año |
| Hetzner Cloud | Servidor (VPS) en EE. UU. | ~US$5–8/mes |
| Laravel Forge | Administra el servidor y los deploys | ~US$12–19/mes |
| Cloudflare (plan Free) | DNS, CDN, SSL, caché y protección | Gratis |
| GitHub | Repositorio privado del código | Gratis |

**Alternativa más barata a Forge:** [Ploi](https://ploi.io) (~€8–10/mes) funciona prácticamente igual. Los pasos de esta guía aplican casi idénticos.

Cómo funciona en producción:

```
Usuario ──► Cloudflare (CDN: caché de páginas, SSL) ──► Servidor Hetzner (Nginx + PHP + SQLite)
```

El sitio no usa cookies ni sesiones, así que Cloudflare guarda las páginas en caché y la mayoría de las visitas ni siquiera llegan al servidor.

---

## 2. Cuentas necesarias

Crea estas cuentas (todas con el mismo correo es más práctico):

1. **Cloudflare** — https://dash.cloudflare.com/sign-up
2. **Hetzner Cloud** — https://console.hetzner.cloud (pide verificar identidad; puede tardar unas horas)
3. **Laravel Forge** — https://forge.laravel.com
4. **GitHub** — https://github.com
5. **Google** (para Search Console, Analytics y AdSense) — una cuenta de Gmail sirve

Activa la **verificación en dos pasos (2FA)** en todas, especialmente Cloudflare, GitHub y Google.

---

## 3. Registrar el dominio en Cloudflare

Registrarlo en Cloudflare simplifica todo: el DNS ya queda allí.

1. En Cloudflare: **Domain Registration → Register Domains**.
2. Busca `tinyknack.com` y cómpralo (activa la renovación automática).
3. Opcional pero recomendable: registra también `tinyknack.app` o `tinyknack.io` para proteger la marca (se pueden redirigir al .com más adelante).

> Si prefieres otro registrador (Namecheap, Porkbun…), registra el dominio allí y luego en Cloudflare usa **Add a site** y cambia los *nameservers* del dominio a los que te indique Cloudflare.

---

## 4. Subir el código a GitHub

El proyecto ya tiene Git inicializado. En una terminal, dentro de la carpeta del proyecto:

```bash
git add .
git commit -m "Initial release of Tiny Knack"
```

En GitHub crea un repositorio **privado** llamado `tinyknack` (sin README ni .gitignore) y luego:

```bash
git remote add origin https://github.com/TU_USUARIO/tinyknack.git
git push -u origin main
```

> El archivo `.env` (con tus claves) **no** se sube: está en `.gitignore`. La configuración de producción se escribe directamente en Forge (paso 6).

---

## 5. Crear el servidor (Hetzner desde Forge)

### 5.1 Conectar Hetzner con Forge

1. En Hetzner Cloud: crea un proyecto `tinyknack` → **Security → API Tokens → Generate API token** con permiso **Read & Write**. Cópialo.
2. En Forge: **Account → Server Providers → Hetzner** y pega el token.
3. En Forge: **Account → Source Control → GitHub** y autoriza el acceso.

### 5.2 Crear el servidor

En Forge: **Create Server**:

| Opción | Valor |
|---|---|
| Provider | Hetzner |
| Server type | **App Server** |
| Region | **Ashburn, VA (US East)** — la mayoría del público está en EE. UU. |
| Size | El más pequeño disponible en EE. UU. (2 vCPU / 2 GB RAM es suficiente) |
| PHP | **8.4** (o 8.3) |
| Database | **None** (usamos SQLite) |
| Name | `tinyknack` |

Forge tarda unos 10 minutos en instalar todo. **Guarda la contraseña de sudo y la de la base de datos que Forge te muestra.**

### 5.3 Node.js

En el servidor (Forge → tu servidor → **PHP / Node** o mediante **Commands**), asegúrate de tener **Node 22 LTS** (Vite 7 necesita Node 20.19+ o 22.12+):

```bash
node -v
```

Si es más antiguo, cámbialo desde la sección de Node en Forge.

---

## 6. Crear el sitio en Forge

### 6.1 Crear el sitio

Forge → tu servidor → **New Site**:

| Opción | Valor |
|---|---|
| Root Domain | `tinyknack.com` |
| Aliases | `www.tinyknack.com` |
| Project Type | Laravel |
| Web Directory | `/public` |

Luego en el sitio → **Git Repository**: elige GitHub, el repo `TU_USUARIO/tinyknack`, rama `main`. **Desmarca** "Install Composer dependencies" si aparece (lo hace el script de deploy).

### 6.2 Variables de entorno (.env de producción)

Sitio → **Environment** → reemplaza todo el contenido por esto (ajusta lo marcado):

```dotenv
APP_NAME="Tiny Knack"
APP_ENV=production
# Forge suele generar APP_KEY; si queda vacía, ver la nota de abajo
APP_KEY=
APP_DEBUG=false
APP_URL=https://tinyknack.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

LOG_CHANNEL=daily
LOG_LEVEL=error

DB_CONNECTION=sqlite

SESSION_DRIVER=file
CACHE_STORE=file
QUEUE_CONNECTION=sync

# Advertising — ver sección 12 (dejar en false hasta que AdSense apruebe el sitio)
ADS_ENABLED=false
ADS_CLIENT_ID=
ADS_SLOT_TOP=
ADS_SLOT_BOTTOM=
ADS_SLOT_SIDEBAR=

# Analytics — ver sección 11
ANALYTICS_ENABLED=false
ANALYTICS_GA_ID=
ANALYTICS_GTM_ID=

# SEO / identidad
# Correo público de contacto (ver nota sobre Email Routing)
SITE_CONTACT_EMAIL=luismiguelmolina8@gmail.com
SITE_SAME_AS=
SITE_GOOGLE_VERIFICATION=
SITE_BING_VERIFICATION=
SITE_FORCE_CANONICAL_HOST=true
SITE_TWITTER=
```

> **APP_KEY:** si quedó vacía, en Forge → sitio → **Commands** ejecuta `php artisan key:generate --force` y vuelve a abrir Environment para comprobar que se llenó.
>
> **Correo de contacto:** para tener `hello@tinyknack.com` gratis, usa **Cloudflare → Email → Email Routing**, que reenvía ese correo a tu Gmail.

### 6.3 Script de deploy

Sitio → **Deployments → Deploy Script** → reemplázalo por:

```bash
cd $FORGE_SITE_PATH
git pull origin $FORGE_SITE_BRANCH

$FORGE_COMPOSER install --no-dev --no-interaction --prefer-dist --optimize-autoloader

npm ci
npm run build

# SQLite: el archivo vive en el servidor (no está en Git)
touch database/database.sqlite
$FORGE_PHP artisan migrate --force
# Los seeders son idempotentes: actualizan herramientas, contenido SEO y categorías
$FORGE_PHP artisan db:seed --force

$FORGE_PHP artisan cache:clear
$FORGE_PHP artisan optimize

( flock -w 10 9 || exit 1
    echo 'Restarting FPM...'; sudo -S service $FORGE_PHP_FPM reload ) 9>/tmp/fpmlock

# Vaciar la caché de Cloudflare (completar en el paso 8.4)
# curl -s -X POST "https://api.cloudflare.com/client/v4/zones/CF_ZONE_ID/purge_cache" \
#   -H "Authorization: Bearer CF_API_TOKEN" -H "Content-Type: application/json" \
#   --data '{"purge_everything":true}'
```

Pulsa **Deploy Now**. Revisa el log: debe terminar sin errores.

Activa **Quick Deploy** para que cada `git push` a `main` despliegue automáticamente.

> **Zero-downtime deployments:** si activas esa opción de Forge, cada deploy usa una carpeta nueva y por lo tanto un `database.sqlite` nuevo. No es un problema: el script lo crea, migra y llena con los seeders en cada deploy, porque todo el contenido vive en el código.

---

## 7. DNS y SSL con Cloudflare

### 7.1 Registros DNS

Cloudflare → `tinyknack.com` → **DNS → Records**. Crea (con la IP pública del servidor que muestra Forge):

| Type | Name | Content | Proxy |
|---|---|---|---|
| A | `@` | IP del servidor | **Proxied** (nube naranja) |
| A | `www` | IP del servidor | **Proxied** |

> Si Hetzner te dio también IPv6, puedes añadir registros **AAAA** equivalentes.

### 7.2 Certificado SSL (Origin Certificate)

Con Cloudflare delante, lo más simple y robusto es un **Origin Certificate** (válido 15 años):

1. Cloudflare → **SSL/TLS → Origin Server → Create Certificate** → deja `tinyknack.com` y `*.tinyknack.com` → **Create**.
2. Copia el **Origin Certificate** y la **Private Key**.
3. Forge → sitio → **SSL → Existing Certificate** → pega ambos → **Install** y luego **Activate**.
4. Cloudflare → **SSL/TLS → Overview** → modo **Full (strict)**.

### 7.3 Redirigir www → sin www

No hace falta configurar nada extra: la aplicación ya redirige con 301 `www.tinyknack.com` y `http://` a `https://tinyknack.com` (middleware `CanonicalUrl`).

---

## 8. Configurar Cloudflare

### 8.1 SSL/TLS → Edge Certificates

- **Always Use HTTPS**: On
- **Minimum TLS Version**: 1.2
- **Automatic HTTPS Rewrites**: On

### 8.2 Speed

- **Speed → Optimization → Content Optimization**: activa **Brotli** (si aparece) y **Early Hints**.
- No actives "Rocket Loader": puede romper los scripts de las herramientas.

### 8.3 Caché de páginas (lo que hace el sitio rapidísimo)

Por defecto Cloudflare no guarda HTML en caché. Crea una regla:

**Caching → Cache Rules → Create rule**:

- **Name:** Cache HTML pages
- **If incoming requests match:** Custom filter expression →
  `(http.host eq "tinyknack.com" and not starts_with(http.request.uri.path, "/up"))`
- **Then → Cache eligibility:** *Eligible for cache*
- **Edge TTL:** *Use cache-control header if present* (la app envía `s-maxage=86400` en producción)
- **Browser TTL:** *Respect origin TTL*

Guarda y despliega la regla.

### 8.4 Vaciar la caché automáticamente en cada deploy

Después de cada deploy hay que vaciar la caché para que se vean los cambios:

1. Cloudflare → página del dominio → copia el **Zone ID** (columna derecha de *Overview*).
2. **My Profile → API Tokens → Create Token → Custom token** con permiso **Zone → Cache Purge → Purge**, limitado a la zona `tinyknack.com`.
3. En el script de deploy de Forge, descomenta las 3 líneas `curl` del final y reemplaza `CF_ZONE_ID` y `CF_API_TOKEN`.

> El token solo vive en Forge (no en Git). Si alguna vez se filtra, revócalo en Cloudflare y crea otro.

### 8.5 Seguridad

- **Security → Bots**: activa **Bot Fight Mode**.
- **Security → Settings**: Security Level *Medium*.

---

## 9. Verificación después del lanzamiento

Abre en el navegador y revisa que todo funcione:

- [ ] https://tinyknack.com carga con candado (HTTPS)
- [ ] http://tinyknack.com y https://www.tinyknack.com redirigen a https://tinyknack.com
- [ ] https://tinyknack.com/Merge-PDF redirige a `/merge-pdf`
- [ ] https://tinyknack.com/robots.txt muestra `Disallow: /up` y la línea `Sitemap:`
- [ ] https://tinyknack.com/sitemap.xml lista todas las herramientas con `https://tinyknack.com/...`
- [ ] Prueba 4–5 herramientas (Merge PDF, Image Compressor, HEIC to JPG, QR Generator, Word Counter)
- [ ] Una URL inexistente muestra la página 404 propia

Comprueba que Cloudflare esté sirviendo desde caché (en una terminal):

```bash
curl -sI https://tinyknack.com/merge-pdf | grep -iE "cf-cache-status|cache-control"
```

La primera vez verás `cf-cache-status: MISS`; repite el comando y debe decir **`HIT`**.

Mide el rendimiento en https://pagespeed.web.dev con la home y una herramienta.

---

## 10. Google Search Console y Bing

### 10.1 Google Search Console

1. Ve a https://search.google.com/search-console → **Add property → Domain** → escribe `tinyknack.com`.
2. Google te da un registro **TXT**. Agrégalo en Cloudflare → DNS (Type `TXT`, Name `@`). Vuelve a Search Console y pulsa **Verify**.
   *(Alternativa: propiedad tipo "URL prefix" con la etiqueta HTML → pega solo el valor `content` en `SITE_GOOGLE_VERIFICATION` en Forge y redeploy.)*
3. **Sitemaps** → envía `https://tinyknack.com/sitemap.xml`.
4. **URL Inspection** → pide indexación de la home y de 5–10 herramientas principales (Merge PDF, Image Compressor, HEIC to JPG, Word Counter, Password Generator…).

Qué mirar las primeras semanas: *Pages* (páginas indexadas), *Performance* (búsquedas que te muestran) y *Core Web Vitals*.

### 10.2 Bing Webmaster Tools

1. https://www.bing.com/webmasters → **Import from Google Search Console** (lo más rápido).
2. Envía también el sitemap. Bing alimenta a DuckDuckGo, Yahoo y ChatGPT Search.

---

## 11. Google Analytics 4

### 11.1 Crear la propiedad

1. https://analytics.google.com → **Admin → Create → Property**: nombre `Tiny Knack`, zona horaria y moneda.
2. **Data streams → Add stream → Web** → URL `https://tinyknack.com`, nombre `tinyknack.com`.
3. Copia el **Measurement ID** (formato `G-XXXXXXXXXX`).
4. En el stream, **Enhanced measurement**: deja activado *Page views, Scrolls, Outbound clicks, Site search*; desactiva *Form interactions* (no hay formularios).

### 11.2 Activarlo en el sitio

Forge → sitio → **Environment**:

```dotenv
ANALYTICS_ENABLED=true
ANALYTICS_GA_ID=G-XXXXXXXXXX
```

Guarda y pulsa **Deploy Now** (el deploy ejecuta `optimize`, que recarga la configuración y vacía la caché de Cloudflare).

> El sitio ya incluye el **Consent Mode v2**: en Europa, Reino Unido y Suiza la analítica queda denegada hasta que el usuario acepte en el banner de Google (se configura en AdSense, sección 12.5). En el resto del mundo funciona directamente.

### 11.3 Eventos que el sitio ya envía

No tienes que programar nada; estos eventos ya están integrados:

| Evento | Cuándo | Parámetros |
|---|---|---|
| `tool_open` | Se abre una herramienta | `tool` |
| `tool_use` | El usuario usa la herramienta | `tool`, `action` y otros |
| `tool_result` | Se obtiene un resultado | `tool`, `count`, `saved_percent`… |
| `file_upload` | Se cargan archivos | `tool`, `count` |
| `file_download` | Se descarga un resultado | `tool`, `format`, `count` |
| `premium_click` | Clic en un enlace "Pro" (futuro) | `tool`, `source` |
| `ad_click` | Clic en un anuncio | `slot` |

Nunca se envía contenido del usuario (ni textos, ni nombres de archivo).

### 11.4 Configuración recomendada en GA4

1. **Admin → Custom definitions → Create custom dimension**:
   - Name `Tool`, Scope **Event**, Event parameter `tool`
   - Name `Action`, Scope **Event**, Event parameter `action`
   - Name `Format`, Scope **Event**, Event parameter `format`

   Sin esto no podrás ver en los informes *qué herramienta* se usa.
2. **Admin → Events** → marca como **Key event** (conversión): `file_download` y `tool_result`.
3. **Admin → Data retention** → cambia a **14 months**.
4. **Admin → Data streams → (stream) → Configure tag settings → List unwanted referrals**: no hace falta nada por ahora.
5. Comprueba que llegan datos: **Reports → Realtime** mientras navegas el sitio (desactiva bloqueadores de anuncios para probar).

Informe útil: **Explore → Free form** con dimensión `Tool` y métrica `Event count`, filtrando `Event name = tool_use`. Así sabrás qué herramientas merecen más inversión.

---

## 12. Google AdSense

### 12.1 Antes de solicitar

AdSense revisa el sitio manualmente. Ya cumples la mayoría de requisitos:

- [x] Política de privacidad con aviso de cookies de publicidad (`/privacy-policy`)
- [x] Páginas About, Terms y Contact
- [x] Contenido original en cada herramienta (pasos, FAQ y texto propio)
- [x] Navegación clara, sitio rápido y sin errores
- [ ] El sitio debe estar **publicado y accesible** en su dominio
- [ ] Recomendable: esperar a que Google haya **indexado** varias páginas (Search Console) y tener algo de tráfico. Solicitar con un sitio recién publicado puede terminar en rechazo por "contenido de bajo valor"; si pasa, se puede volver a solicitar.
- [ ] Ser mayor de 18 años y tener datos de pago (para Costa Rica, el pago suele ser por transferencia bancaria)

### 12.2 Solicitar

1. https://adsense.google.com → **Get started** → URL `tinyknack.com`, país, acepta términos.
2. AdSense te mostrará tu **Publisher ID** (`ca-pub-XXXXXXXXXXXXXXXX`) y pedirá verificar el sitio.

### 12.3 Verificar el sitio (sin activar anuncios todavía)

Forge → sitio → **Environment**:

```dotenv
ADS_ENABLED=false
ADS_CLIENT_ID=ca-pub-XXXXXXXXXXXXXXXX
```

Deploy. Con solo `ADS_CLIENT_ID`, el sitio ya:

- publica la meta `<meta name="google-adsense-account" …>` en todas las páginas;
- sirve **https://tinyknack.com/ads.txt** con tu línea autorizada (`google.com, pub-…, DIRECT, f08c47fec0942fa0`).

En AdSense elige el método de verificación **Meta tag** (o *ads.txt snippet*) → **Verify** → **Request review**. La revisión suele tardar de unos días a 2–4 semanas.

### 12.4 Cuando aprueben: crear los bloques de anuncios

El sitio coloca los anuncios en 3 posiciones fijas y no intrusivas (no usamos *Auto ads*):

1. AdSense → **Ads → By ad unit → Display ads**. Crea tres, todos **Responsive**:
   - `TK Top` (debajo del título de la herramienta)
   - `TK Bottom` (debajo de la herramienta)
   - `TK Sidebar` (columna lateral, solo en escritorio)
2. De cada uno copia el número `data-ad-slot="1234567890"`.
3. AdSense → **Ads → By site → tinyknack.com** → **desactiva Auto ads** (evita anuncios superpuestos que empeoran la experiencia y las Core Web Vitals).
4. Forge → **Environment**:

```dotenv
ADS_ENABLED=true
ADS_CLIENT_ID=ca-pub-XXXXXXXXXXXXXXXX
ADS_SLOT_TOP=1111111111
ADS_SLOT_BOTTOM=2222222222
ADS_SLOT_SIDEBAR=3333333333
```

Deploy. Los anuncios pueden tardar unas horas en aparecer (al principio se verán espacios en blanco).

> Para desactivar todos los anuncios en cualquier momento: `ADS_ENABLED=false` y deploy. Una herramienta concreta se puede dejar sin anuncios poniendo `ads_enabled = false` en su fila del seeder.

### 12.5 Consentimiento para Europa (obligatorio)

Google exige un banner de consentimiento certificado para usuarios del EEE, Reino Unido y Suiza:

1. AdSense → **Privacy & messaging → European regulations → Create message**.
2. Idioma principal inglés y añade también **alemán, francés, italiano, español y portugués** (el sitio está en esos idiomas y Alemania, Francia e Italia son mercados clave del EEE). Añade la URL de la política de privacidad `https://tinyknack.com/privacy-policy`, estilo acorde (fondo claro, botón color `#0f766e`).
3. **Publish**.

El banner se muestra automáticamente solo en esas regiones y actualiza el *Consent Mode* que ya configura el sitio (también para Analytics).

Opcional: **Privacy & messaging → US state regulations** para los avisos de privacidad de estados como California.

### 12.6 Buenas prácticas (para no perder la cuenta)

- **Nunca hagas clic en tus propios anuncios** ni pidas a otros que lo hagan.
- No coloques anuncios encima de los botones de las herramientas (el diseño actual ya lo evita).
- Revisa **Policy center** en AdSense una vez por semana.
- Mira el rendimiento por bloque en **Reports → By ad unit** y ajusta (por ejemplo, desactivar el lateral si rinde poco).

---

## 13. Mantenimiento

### Publicar cambios

```bash
git add .
git commit -m "Describe el cambio"
git push
```

Con Quick Deploy activado, Forge despliega solo y vacía la caché de Cloudflare.

### Agregar una herramienta nueva

Sigue el checklist de `CLAUDE.md` (sección *Adding a new tool*). Antes del commit, **en tu computadora**:

```bash
php artisan db:seed
php artisan seo:images     # genera la imagen para redes de la nueva herramienta
php artisan test
npm run test:js
```

Las imágenes generadas (`public/images/og/…`) se suben a Git; el servidor no necesita generarlas.

### Copias de seguridad

- Hetzner → servidor → **Backups**: actívalo (cuesta ~20 % del precio del servidor) o haz **Snapshots** antes de cambios grandes.
- El contenido del sitio vive en el código (seeders), así que GitHub ya es tu copia principal.

### Actualizaciones

- Una vez al mes: `composer update` y `npm update` en tu computadora, ejecuta los tests y despliega.
- Forge aplica las actualizaciones de seguridad del sistema operativo automáticamente.

---

## 14. Dar a conocer el sitio

El SEO interno ya está listo; lo que más acelera el tráfico al principio son los **enlaces externos** y las **menciones**:

1. **Directorios de herramientas y startups:** Product Hunt, AlternativeTo (registra cada herramienta como alternativa a Smallpdf, TinyPNG, iLovePDF…), SaaSHub y BetaList.
2. **Comunidades:** Reddit (r/InternetIsBeautiful, r/webdev, r/productivity — respeta las reglas de autopromoción), Hacker News (*Show HN*), Indie Hackers.
3. **Responder preguntas reales** en Reddit, Quora o Stack Exchange donde la herramienta resuelve el problema ("how to convert HEIC to JPG on Windows").
4. **Search Console cada semana:** busca páginas con muchas impresiones y pocos clics → mejora título y descripción; y búsquedas nuevas que justifiquen herramientas nuevas.

Ten paciencia: un dominio nuevo suele tardar de 6 a 12 meses en recibir tráfico orgánico importante.
