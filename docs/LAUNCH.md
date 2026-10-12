# Guía de lanzamiento — Tiny Knacks

Guía paso a paso para publicar **tinyknacks.com** con **Cloudways + Cloudflare**, con despliegue automático desde **GitHub**, y después configurar **Search Console, Google Analytics 4 y Google AdSense**.

> Tiempo estimado: 2–3 horas para el lanzamiento. AdSense requiere aprobación de Google (de días a algunas semanas).
> Los precios son aproximados: confírmalos al contratar.

---

## Índice

1. [Resumen y costos](#1-resumen-y-costos)
2. [Lo que ya tienes](#2-lo-que-ya-tienes)
3. [Pasar el DNS a Cloudflare (sin perder el correo)](#3-pasar-el-dns-a-cloudflare)
4. [Crear el servidor y la aplicación en Cloudways](#4-cloudways-servidor-y-aplicación)
5. [Conectar el dominio y el SSL](#5-dominio-y-ssl)
6. [Configurar el .env de producción](#6-env-de-producción)
7. [Despliegue automático con GitHub Actions](#7-despliegue-automático-con-github-actions)
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
| Squarespace Domains | Registro de `tinyknacks.com` (comprado con Google Workspace) | ~US$12–20/año |
| Google Workspace | Correo `info@tinyknacks.com` | Lo que ya pagas |
| Cloudways (DigitalOcean 1–2 GB) | Servidor administrado | ~US$14–28/mes |
| Cloudflare (plan Free) | DNS, CDN, SSL, caché y protección | Gratis |
| GitHub + GitHub Actions | Código y despliegue automático | Gratis (2.000 min/mes en repos privados; cada deploy usa ~4) |

Cómo funciona en producción:

```
Usuario ──► Cloudflare (caché de páginas, SSL) ──► Cloudways (Nginx/Apache + PHP + SQLite)

Tú: git push ──► GitHub Actions (tests + build) ──► sube los archivos a Cloudways por SSH
```

El sitio no usa cookies ni sesiones, así que Cloudflare guarda las páginas en caché y la mayoría de las visitas ni siquiera llegan al servidor.

El sitio está en **6 idiomas**: inglés en la raíz (`/merge-pdf`) y el resto con prefijo (`/es/unir-pdf`, `/pt/juntar-pdf`, `/fr/fusionner-pdf`, `/de/pdf-zusammenfuegen`, `/it/unisci-pdf`). La sugerencia y el recuerdo del idioma del visitante ocurren en el navegador, así que no afectan a la caché ni al SEO: **no configures redirecciones por país en Cloudflare ni en el servidor**.

> **Por qué GitHub Actions:** Cloudways solo sabe hacer `git pull`, pero este proyecto necesita `composer install` y `npm run build` en cada despliegue. El workflow `.github/workflows/deploy.yml` (ya incluido en el repo) ejecuta los tests, compila todo y lo sube a Cloudways por SSH.

---

## 2. Lo que ya tienes

- [x] Dominio **tinyknacks.com** (registrado en Squarespace Domains a través de Google Workspace)
- [x] Correo **info@tinyknacks.com** (alias de Google Workspace) — es el contacto público del sitio
- [x] Cuenta de **Cloudways** — crea el servidor en **tu propia cuenta** (con tu facturación), no dentro de la cuenta de otra persona
- [x] Código en **GitHub**: https://github.com/luismi97/mini-tools (rama `main`)

Te falta crear:

- **Cloudflare** — https://dash.cloudflare.com/sign-up (gratis)
- **Google Search Console, Analytics y AdSense** — con tu cuenta de Google (secciones 10–12)

Recomendado: pon el repo de GitHub como **privado** (repo → **Settings → General → Danger Zone → Change visibility**) y activa la **verificación en dos pasos** en Cloudflare, Cloudways, GitHub y Google.

---

## 3. Pasar el DNS a Cloudflare

El dominio **sigue registrado en Squarespace**; solo cambiamos quién responde el DNS. Así Cloudflare puede guardar el sitio en caché y darle SSL.

### 3.1 Agregar el dominio en Cloudflare

1. Cloudflare → **Add a domain** → `tinyknacks.com` → plan **Free**.
2. Cloudflare copia los registros DNS actuales. **Revisa la lista con cuidado** antes de continuar.

### 3.2 Registros que deben quedar (correo de Google Workspace)

Si falta alguno, créalo. **Sin el MX dejarías de recibir correo en info@.**

| Tipo | Nombre | Contenido | Proxy |
|---|---|---|---|
| MX | `@` | `smtp.google.com` — prioridad `1` | DNS only |
| TXT | `@` | `v=spf1 include:_spf.google.com ~all` | DNS only |
| TXT | `@` | `google-site-verification=…` (si existe, cópialo tal cual) | DNS only |

**Borra** los registros A, AAAA o CNAME de Squarespace para `@` y `www` (apuntan a la página de estacionamiento de Squarespace). Los nuevos se crean en la sección 5.

### 3.3 Cambiar los nameservers en Squarespace

1. Cloudflare te muestra **2 nameservers** (algo como `xxx.ns.cloudflare.com`).
2. Squarespace → **Domains → tinyknacks.com → DNS → Domain nameservers → Use custom nameservers** → pega los dos → guarda.
3. Espera el correo de Cloudflare que dice que el dominio está **Active** (de minutos a unas horas).
4. Envía un correo de prueba a `info@tinyknacks.com` desde otra cuenta y confirma que llega.

### 3.4 Proteger el correo contra el spam (recomendado)

- **DKIM:** admin.google.com → **Apps → Google Workspace → Gmail → Authenticate email** → **Generate new record** → crea en Cloudflare el TXT que te da (nombre `google._domainkey`) → vuelve y pulsa **Start authentication**.
- **DMARC:** en Cloudflare, TXT con nombre `_dmarc` y contenido `v=DMARC1; p=none; rua=mailto:info@tinyknacks.com`.

---

## 4. Cloudways: servidor y aplicación

### 4.1 Crear el servidor

Cloudways → **Add Server**:

| Opción | Valor |
|---|---|
| Application | **Laravel** |
| Application / Server name | `tinyknacks` |
| Provider | **DigitalOcean** |
| Size | **1 GB** para empezar (sube a 2 GB si hace falta; Cloudflare absorbe casi todo el tráfico) |
| Location | **New York** — a medio camino entre EE. UU., Latinoamérica y Europa |

Tarda unos 10 minutos.

### 4.2 Ajustes del servidor

1. **Server Management → Settings & Packages → Packages → PHP**: elige **8.3**.
2. **Server Management → Master Credentials**: anota la **Public IP** y el **Username** (`master_…`). Los usarás en las secciones 5 y 7.

### 4.3 Ajustes de la aplicación

Abre la aplicación → **Application Management**:

1. **Application Settings → General**:
   - **Webroot:** debe ser `public_html/public` (Cloudways lo pone así para Laravel; si no, cámbialo).
   - Anota el nombre de la **carpeta** de la aplicación (una cadena como `abcdefghij`). La ruta completa es `/home/master/applications/abcdefghij/public_html`.
2. **Application Settings → Varnish:** **desactívalo**. Cloudflare ya hace de caché; con Varnish además verías páginas viejas después de cada deploy.

---

## 5. Dominio y SSL

### 5.1 Dominio en Cloudways

Aplicación → **Domain Management**:

- **Primary domain:** `tinyknacks.com`
- **Alias:** `www.tinyknacks.com`

### 5.2 Apuntar el dominio al servidor (en Cloudflare)

Cloudflare → `tinyknacks.com` → **DNS → Records** → crea, con la **Public IP** del servidor (paso 4.2):

| Tipo | Nombre | Contenido | Proxy |
|---|---|---|---|
| A | `@` | IP del servidor | **Proxied** (nube naranja) |
| A | `www` | IP del servidor | **Proxied** |

### 5.3 Certificado SSL (Origin Certificate)

1. Cloudflare → **SSL/TLS → Origin Server → Create Certificate** → deja `tinyknacks.com` y `*.tinyknacks.com` → **Create**.
2. Copia el **Origin Certificate** y la **Private Key** (la clave solo se muestra una vez).
3. Cloudways → aplicación → **SSL Certificate** → **I have my own certificate** → pega el certificado y la clave → **Install**.
4. Cloudflare → **SSL/TLS → Overview** → modo **Full (strict)**.

La aplicación ya redirige con 301 `www` y `http://` a `https://tinyknacks.com` (middleware `CanonicalUrl`); no hace falta configurar nada más.

---

## 6. .env de producción

El `.env` vive solo en el servidor (no está en GitHub). Conéctate por SSH con las credenciales maestras (o usa SFTP con FileZilla):

```bash
ssh master_xxxxx@IP_DEL_SERVIDOR
cd applications/CARPETA_DE_LA_APP/public_html
nano .env
```

Reemplaza todo el contenido por esto:

```dotenv
APP_NAME="Tiny Knacks"
APP_ENV=production
APP_KEY=
APP_DEBUG=false
APP_URL=https://tinyknacks.com

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
SITE_CONTACT_EMAIL=info@tinyknacks.com
SITE_SAME_AS=
SITE_GOOGLE_VERIFICATION=
SITE_BING_VERIFICATION=
SITE_FORCE_CANONICAL_HOST=true
SITE_TWITTER=
```

Guarda (`Ctrl+O`, `Enter`, `Ctrl+X`). Después del **primer deploy** (sección 7) genera la clave una sola vez:

```bash
php artisan key:generate --force
php artisan optimize
```

> **Cada vez que cambies el `.env`** (por ejemplo para activar Analytics o AdSense), vuelve a ejecutar el deploy (GitHub → **Actions → Deploy → Run workflow**). El deploy ejecuta `php artisan optimize`, que recarga la configuración, y vacía la caché de Cloudflare.

---

## 7. Despliegue automático con GitHub Actions

### 7.1 Crear una clave SSH solo para los despliegues

En tu computadora (Git Bash o PowerShell):

```bash
ssh-keygen -t ed25519 -C "github-deploy-tinyknacks" -f tinyknacks_deploy -N ""
```

Se crean dos archivos: `tinyknacks_deploy` (privada) y `tinyknacks_deploy.pub` (pública).

1. Cloudways → **Server Management → Master Credentials → SSH Public Keys → Add** → pega el contenido de `tinyknacks_deploy.pub`.
2. Prueba la conexión: `ssh -i tinyknacks_deploy master_xxxxx@IP_DEL_SERVIDOR` (debe entrar sin pedir contraseña).

### 7.2 Guardar los secretos en GitHub

GitHub → repo `mini-tools` → **Settings → Secrets and variables → Actions → New repository secret**. Crea:

| Nombre | Valor |
|---|---|
| `CLOUDWAYS_HOST` | La Public IP del servidor |
| `CLOUDWAYS_USER` | El usuario maestro (`master_…`) |
| `CLOUDWAYS_SSH_KEY` | El contenido **completo** del archivo privado `tinyknacks_deploy` (incluidas las líneas `-----BEGIN…` y `-----END…`) |
| `CLOUDWAYS_APP_PATH` | `/home/master/applications/CARPETA_DE_LA_APP/public_html` |
| `CF_ZONE_ID` | (sección 8.4) Zone ID de Cloudflare |
| `CF_API_TOKEN` | (sección 8.4) token de Cloudflare para vaciar la caché |

Después borra el archivo privado de tu computadora o guárdalo en un gestor de contraseñas: solo lo necesita GitHub.

Por último, **activa los despliegues**: en la misma pantalla, pestaña **Variables → New repository variable** → nombre `DEPLOY_ENABLED`, valor `true`. Hasta que la crees, cada `git push` solo ejecuta los tests (útil para comprobar que nada se rompió) y no intenta desplegar.

### 7.3 Primer despliegue

GitHub → **Actions → Deploy → Run workflow** (o simplemente haz un `git push` a `main`). El workflow:

1. ejecuta los tests de PHP y JavaScript (si fallan, **no** despliega);
2. instala las dependencias y compila los assets;
3. sube los archivos a Cloudways (sin tocar `.env`, la base de datos ni `storage/`);
4. crea la base SQLite si no existe, migra y carga el contenido (herramientas, traducciones, SEO);
5. optimiza Laravel y vacía la caché de Cloudflare.

Tarda unos 4 minutos. Luego ejecuta en el servidor el `key:generate` del paso 6.

### 7.4 Si algo falla

- **El job "test" falla:** el error está en el código; revísalo antes de desplegar.
- **"Permission denied (publickey)":** la clave pública no está en Cloudways o el secreto `CLOUDWAYS_SSH_KEY` está incompleto.
- **Error 500 en el sitio:** revisa `storage/logs/laravel-*.log` en el servidor. Si es un problema de permisos, usa Cloudways → aplicación → **Application Settings → Reset Permission** y vuelve a desplegar.
- **Sigues viendo la página por defecto de Laravel o de Cloudways:** revisa que la **Webroot** sea `public_html/public` y que `CLOUDWAYS_APP_PATH` apunte a esa misma aplicación.

> Este workflow está preparado según la estructura estándar de Cloudways, pero todavía no se ha probado contra tu servidor real. Si el primer deploy da un error, copia el log del paso que falló (Actions → el deploy → el paso en rojo) y lo ajustamos.

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
  `(http.host eq "tinyknacks.com" and not starts_with(http.request.uri.path, "/up"))`
- **Then → Cache eligibility:** *Eligible for cache*
- **Edge TTL:** *Use cache-control header if present* (la app envía `s-maxage=86400` en producción)
- **Browser TTL:** *Respect origin TTL*

Guarda y despliega la regla.

### 8.4 Vaciar la caché automáticamente en cada deploy

1. Cloudflare → página del dominio → copia el **Zone ID** (columna derecha de *Overview*).
2. **My Profile → API Tokens → Create Token → Custom token** con permiso **Zone → Cache Purge → Purge**, limitado a la zona `tinyknacks.com`.
3. Guarda ambos valores en GitHub como `CF_ZONE_ID` y `CF_API_TOKEN` (paso 7.2). El workflow los usa al final de cada deploy.

> El token solo vive en GitHub (no en el código). Si alguna vez se filtra, revócalo en Cloudflare y crea otro.

### 8.5 Seguridad

- **Security → Bots**: activa **Bot Fight Mode**.
- **Security → Settings**: Security Level *Medium*.

---

## 9. Verificación después del lanzamiento

Abre en el navegador y revisa que todo funcione:

- [ ] https://tinyknacks.com carga con candado (HTTPS)
- [ ] http://tinyknacks.com y https://www.tinyknacks.com redirigen a https://tinyknacks.com
- [ ] https://tinyknacks.com/Merge-PDF redirige a `/merge-pdf`
- [ ] https://tinyknacks.com/robots.txt muestra `Disallow: /up` y la línea `Sitemap:`
- [ ] https://tinyknacks.com/sitemap.xml lista todas las herramientas con `https://tinyknacks.com/...`
- [ ] El sitemap incluye también las versiones `/es/`, `/pt/`, `/fr/`, `/de/` e `/it/` con sus enlaces `hreflang`
- [ ] Prueba 4–5 herramientas (Merge PDF, Image Compressor, HEIC to JPG, QR Generator, Word Counter)
- [ ] https://tinyknacks.com/es, `/pt`, `/fr`, `/de` e `/it` cargan en su idioma, y el selector de idioma lleva a la misma página traducida
- [ ] En el celular, el botón ☰ abre el menú con categorías, "All tools", "Suggest a tool" e idiomas
- [ ] https://tinyknacks.com/suggest-a-tool abre tu app de correo con la sugerencia dirigida a tu email
- [ ] Con el navegador en otro idioma (p. ej. español), la home en inglés muestra el aviso "Esta página también está disponible en Español"
- [ ] Una URL inexistente muestra la página 404 propia

Comprueba que Cloudflare esté sirviendo desde caché (en una terminal):

```bash
curl -sI https://tinyknacks.com/merge-pdf | grep -iE "cf-cache-status|cache-control"
```

La primera vez verás `cf-cache-status: MISS`; repite el comando y debe decir **`HIT`**.

Mide el rendimiento en https://pagespeed.web.dev con la home y una herramienta.

---

## 10. Google Search Console y Bing

### 10.1 Google Search Console

1. Ve a https://search.google.com/search-console → **Add property → Domain** → escribe `tinyknacks.com`.
2. Google te da un registro **TXT**. Agrégalo en Cloudflare → DNS (Type `TXT`, Name `@`). Vuelve a Search Console y pulsa **Verify**.
   *(Alternativa: propiedad tipo "URL prefix" con la etiqueta HTML → pega solo el valor `content` en `SITE_GOOGLE_VERIFICATION` del `.env` del servidor y vuelve a desplegar.)*
3. **Sitemaps** → envía `https://tinyknacks.com/sitemap.xml`. Es un único sitemap con **todas las páginas de los 6 idiomas** (unas 400 URLs) y sus enlaces `hreflang`: no hace falta un sitemap por idioma.
4. **URL Inspection** → pide indexación (hay un límite de ~10 por día, repártelas en varios días):
   - Día 1: la home de cada idioma — `/`, `/es`, `/pt`, `/fr`, `/de`, `/it` — y 4 herramientas en inglés (Merge PDF, Image Compressor, HEIC to JPG, Word Counter).
   - Días siguientes: las mismas herramientas en los otros idiomas (por ejemplo `/es/unir-pdf`, `/de/pdf-zusammenfuegen`).
   - El resto lo descubre Google solo a través del sitemap y los enlaces internos.

### 10.2 Ver el rendimiento por idioma (opcional, muy útil)

La propiedad de dominio muestra todo junto. Para ver cada idioma por separado, añade además propiedades **URL prefix** (se verifican solas porque el dominio ya está verificado):

- `https://tinyknacks.com/es/`
- `https://tinyknacks.com/pt/`
- `https://tinyknacks.com/fr/`
- `https://tinyknacks.com/de/`
- `https://tinyknacks.com/it/`

Alternativa sin crear propiedades: en *Performance* usa el filtro **Page → URLs containing** `/de/`.

### 10.3 Qué revisar las primeras semanas

- **Pages:** cuántas páginas están indexadas. Si aparece *"Duplicate, Google chose different canonical"* entre idiomas, avísame: no debería pasar, porque cada idioma tiene su canonical y sus `hreflang`.
- **Performance:** búsquedas por las que apareces y en qué países. Te dirá qué idioma crece más rápido.
- **Core Web Vitals:** deberían salir en verde (el sitio es rápido y casi todo se sirve desde la caché de Cloudflare).
- Espera que **inglés y español** empiecen antes, y **alemán, francés e italiano** (menos competencia y anuncios mejor pagados) tarden algo más en indexarse por ser un dominio nuevo.

### 10.4 Bing Webmaster Tools

1. https://www.bing.com/webmasters → **Import from Google Search Console** (lo más rápido).
2. Envía también el sitemap. Bing alimenta a DuckDuckGo, Yahoo y ChatGPT Search.

---

## 11. Google Analytics 4

### 11.1 Crear la propiedad

1. https://analytics.google.com → **Admin → Create → Property**: nombre `Tiny Knacks`, zona horaria y moneda.
2. **Data streams → Add stream → Web** → URL `https://tinyknacks.com`, nombre `tinyknacks.com`.
3. Copia el **Measurement ID** (formato `G-XXXXXXXXXX`).
4. En el stream, **Enhanced measurement**: deja activado *Page views, Scrolls, Outbound clicks, Site search*; desactiva *Form interactions* (no hay formularios).

### 11.2 Activarlo en el sitio

Edita el `.env` del servidor (sección 6):

```dotenv
ANALYTICS_ENABLED=true
ANALYTICS_GA_ID=G-XXXXXXXXXX
```

Guarda y despliega (GitHub → **Actions → Deploy → Run workflow**): el deploy ejecuta `optimize`, que recarga la configuración, y vacía la caché de Cloudflare.

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
| `language_switch` | El visitante cambia de idioma (selector o aviso) | `from`, `to`, `source` (`switcher` / `suggestion`) |
| `premium_click` | Clic en un enlace "Pro" (futuro) | `tool`, `source` |
| `ad_click` | Clic en un anuncio | `slot` |

Nunca se envía contenido del usuario (ni textos, ni nombres de archivo).

### 11.4 Configuración recomendada en GA4

1. **Admin → Custom definitions → Create custom dimension**:
   - Name `Tool`, Scope **Event**, Event parameter `tool`
   - Name `Action`, Scope **Event**, Event parameter `action`
   - Name `Format`, Scope **Event**, Event parameter `format`

   - Name `Language to`, Scope **Event**, Event parameter `to` (qué idiomas eligen los visitantes)

   Sin esto no podrás ver en los informes *qué herramienta* se usa.

   Para comparar idiomas no necesitas nada más: en cualquier informe filtra por **Page path** que empiece con `/es/`, `/de/`, etc. (las páginas en inglés no tienen prefijo).
2. **Admin → Events** → marca como **Key event** (conversión): `file_download` y `tool_result`.
3. **Admin → Data retention** → cambia a **14 months**.
4. **Admin → Data streams → (stream) → Configure tag settings → List unwanted referrals**: no hace falta nada por ahora.
5. Comprueba que llegan datos: **Reports → Realtime** mientras navegas el sitio (desactiva bloqueadores de anuncios para probar).

Informe útil: **Explore → Free form** con dimensión `Tool` y métrica `Event count`, filtrando `Event name = tool_use`. Así sabrás qué herramientas merecen más inversión.

---

## 12. Google AdSense

### 12.1 Antes de solicitar

AdSense revisa el sitio manualmente. Ya cumples la mayoría de requisitos:

- [x] Política de privacidad con aviso de cookies de publicidad (`/privacy-policy`), en los 6 idiomas
- [x] Páginas About, Terms, Contact y Suggest a tool, en los 6 idiomas
- [x] Los 6 idiomas del sitio están entre los que AdSense admite
- [x] Contenido original en cada herramienta (pasos, FAQ y texto propio)
- [x] Navegación clara, sitio rápido y sin errores
- [ ] El sitio debe estar **publicado y accesible** en su dominio
- [ ] Recomendable: esperar a que Google haya **indexado** varias páginas (Search Console) y tener algo de tráfico. Solicitar con un sitio recién publicado puede terminar en rechazo por "contenido de bajo valor"; si pasa, se puede volver a solicitar.
- [ ] Ser mayor de 18 años y tener datos de pago (para Costa Rica, el pago suele ser por transferencia bancaria)

### 12.2 Solicitar

1. https://adsense.google.com → **Get started** → URL `tinyknacks.com`, país, acepta términos.
2. AdSense te mostrará tu **Publisher ID** (`ca-pub-XXXXXXXXXXXXXXXX`) y pedirá verificar el sitio.

### 12.3 Verificar el sitio (sin activar anuncios todavía)

Edita el `.env` del servidor (sección 6):

```dotenv
ADS_ENABLED=false
ADS_CLIENT_ID=ca-pub-XXXXXXXXXXXXXXXX
```

Despliega (**Actions → Deploy → Run workflow**). Con solo `ADS_CLIENT_ID`, el sitio ya:

- publica la meta `<meta name="google-adsense-account" …>` en todas las páginas;
- sirve **https://tinyknacks.com/ads.txt** con tu línea autorizada (`google.com, pub-…, DIRECT, f08c47fec0942fa0`).

En AdSense elige el método de verificación **Meta tag** (o *ads.txt snippet*) → **Verify** → **Request review**. La revisión suele tardar de unos días a 2–4 semanas.

### 12.4 Cuando aprueben: crear los bloques de anuncios

> ⚠️ **Antes de activar los anuncios, publica el mensaje de consentimiento europeo (sección 12.5).** Sin él, Google solo muestra anuncios limitados (que pagan mucho menos) en el EEE, Reino Unido y Suiza, y ahí están tres de tus idiomas: alemán, francés e italiano, que además suelen ser de los anuncios mejor pagados.

El sitio coloca los anuncios en 3 posiciones fijas y no intrusivas (no usamos *Auto ads*). Los mismos bloques sirven para los 6 idiomas: AdSense elige anuncios según el idioma de la página y el país del visitante.

1. AdSense → **Ads → By ad unit → Display ads**. Crea tres, todos **Responsive**:
   - `TK Top` (debajo del título de la herramienta)
   - `TK Bottom` (debajo de la herramienta)
   - `TK Sidebar` (columna lateral, solo en escritorio)
2. De cada uno copia el número `data-ad-slot="1234567890"`.
3. AdSense → **Ads → By site → tinyknacks.com** → **desactiva Auto ads** (evita anuncios superpuestos que empeoran la experiencia y las Core Web Vitals).
4. Edita el `.env` del servidor:

```dotenv
ADS_ENABLED=true
ADS_CLIENT_ID=ca-pub-XXXXXXXXXXXXXXXX
ADS_SLOT_TOP=1111111111
ADS_SLOT_BOTTOM=2222222222
ADS_SLOT_SIDEBAR=3333333333
```

Despliega (**Actions → Deploy → Run workflow**). Los anuncios pueden tardar unas horas en aparecer (al principio se verán espacios en blanco).

> Para desactivar todos los anuncios en cualquier momento: `ADS_ENABLED=false` y deploy. Una herramienta concreta se puede dejar sin anuncios poniendo `ads_enabled = false` en su fila del seeder.

### 12.5 Consentimiento para Europa (obligatorio)

Google exige un banner de consentimiento certificado para usuarios del EEE, Reino Unido y Suiza:

1. AdSense → **Privacy & messaging → European regulations → Create message**.
2. Idioma principal inglés y añade también **alemán, francés, italiano, español y portugués** (el sitio está en esos idiomas y Alemania, Francia e Italia son mercados clave del EEE). Añade la URL de la política de privacidad `https://tinyknacks.com/privacy-policy`, estilo acorde (fondo claro, botón color `#0f766e`).
3. **Publish**.

El banner se muestra automáticamente solo en esas regiones y actualiza el *Consent Mode* que ya configura el sitio (también para Analytics).

Opcional: **Privacy & messaging → US state regulations** para los avisos de privacidad de estados como California.

### 12.6 Buenas prácticas (para no perder la cuenta)

- **Nunca hagas clic en tus propios anuncios** ni pidas a otros que lo hagan.
- No coloques anuncios encima de los botones de las herramientas (el diseño actual ya lo evita).
- Revisa **Policy center** en AdSense una vez por semana.
- Mira el rendimiento por bloque en **Reports → By ad unit** y ajusta (por ejemplo, desactivar el lateral si rinde poco).
- Mira **Reports → By country**: verás cuánto paga cada mercado (normalmente Alemania, EE. UU. y Francia mucho más que Latinoamérica). Úsalo para decidir en qué idioma invertir primero en contenido nuevo.

---

## 13. Mantenimiento

### Publicar cambios

```bash
git add .
git commit -m "Describe el cambio"
git push
```

GitHub Actions ejecuta los tests, despliega en Cloudways y vacía la caché de Cloudflare en unos 4 minutos. Puedes seguir el progreso en la pestaña **Actions** del repo; si un test falla, no se despliega nada.

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

- Cloudways → servidor → **Backups**: activa las copias automáticas diarias (vienen incluidas en el plan) y haz una copia manual antes de cambios grandes.
- El contenido del sitio vive en el código (seeders), así que GitHub ya es tu copia principal.

### Actualizaciones

- Una vez al mes: `composer update` y `npm update` en tu computadora, ejecuta los tests y despliega.
- Cloudways aplica las actualizaciones de seguridad del sistema operativo. Cuando quieras cambiar de versión de PHP, hazlo desde **Settings & Packages** y despliega de nuevo.

---

## 14. Dar a conocer el sitio

El SEO interno ya está listo; lo que más acelera el tráfico al principio son los **enlaces externos** y las **menciones**:

1. **Directorios de herramientas y startups:** Product Hunt, AlternativeTo (registra cada herramienta como alternativa a Smallpdf, TinyPNG, iLovePDF…), SaaSHub y BetaList.
2. **Comunidades:** Reddit (r/InternetIsBeautiful, r/webdev, r/productivity — respeta las reglas de autopromoción), Hacker News (*Show HN*), Indie Hackers.
3. **Responder preguntas reales** en Reddit, Quora o Stack Exchange donde la herramienta resuelve el problema ("how to convert HEIC to JPG on Windows").
4. **Search Console cada semana:** busca páginas con muchas impresiones y pocos clics → mejora título y descripción; y búsquedas nuevas que justifiquen herramientas nuevas.
5. **Cada idioma tiene sus propias comunidades:** por ejemplo r/de, Gutefrage.net o Mydealz en alemán; r/france o Comment Ça Marche en francés; r/italy en italiano; r/brasil o Tecmundo en portugués; y foros en español. Mencionar la versión traducida (`/de/…`, `/fr/…`) en el idioma de la comunidad funciona mucho mejor que enlazar la inglesa.

Ten paciencia: un dominio nuevo suele tardar de 6 a 12 meses en recibir tráfico orgánico importante.
