# Mini Tools Portal — Plan de desarrollo

## 1. Objetivo

Construir un portal web de mini herramientas gratuitas que pueda crecer progresivamente hasta contener decenas de herramientas.

El modelo de negocio será:

1. Herramientas gratuitas con publicidad.
2. Algunas herramientas Premium.
3. Posibilidad futura de afiliados.
4. SEO como principal fuente de tráfico orgánico.

El sistema debe estar diseñado para poder agregar una nueva herramienta sin modificar la arquitectura principal.

---

# 2. Stack

Utilizar:

* Laravel
* PHP
* Blade
* Tailwind CSS
* Alpine.js cuando sea necesario
* Vite
* MySQL
* Laravel Eloquent
* Laravel Blade Components

No utilizar React salvo que una herramienta específica realmente lo necesite.

Priorizar herramientas que puedan ejecutarse completamente en el navegador cuando sea posible.

---

# 3. Arquitectura

La aplicación debe tener una arquitectura modular.

Estructura aproximada:

```text
app/
├── Http/
│   └── Controllers/
│       ├── HomeController.php
│       ├── ToolController.php
│       └── Tools/
│           ├── JsonFormatterController.php
│           ├── ImageCompressorController.php
│           ├── JpgToWebpController.php
│           ├── LoanCalculatorController.php
│           └── QrGeneratorController.php
│
├── Services/
│   └── Tools/
│       ├── JsonFormatterService.php
│       ├── ImageCompressorService.php
│       ├── JpgToWebpService.php
│       ├── LoanCalculatorService.php
│       └── QrGeneratorService.php
│
└── Models/
    ├── Tool.php
    └── Category.php

resources/
├── views/
│   ├── layouts/
│   │   └── app.blade.php
│   │
│   ├── components/
│   │   ├── ads/
│   │   │   ├── top.blade.php
│   │   │   ├── bottom.blade.php
│   │   │   └── sidebar.blade.php
│   │   │
│   │   ├── tool-card.blade.php
│   │   ├── tool-header.blade.php
│   │   └── breadcrumbs.blade.php
│   │
│   ├── home.blade.php
│   ├── category.blade.php
│   └── tools/
│       ├── json-formatter.blade.php
│       ├── image-compressor.blade.php
│       ├── jpg-to-webp.blade.php
│       ├── loan-calculator.blade.php
│       └── qr-generator.blade.php
│
└── css/
    └── app.css

routes/
└── web.php

database/
├── migrations/
└── seeders/
```

La estructura puede modificarse si existe una mejor solución, pero debe mantenerse el principio de separación entre herramientas.

---

# 4. Diseño del sitio

El sitio debe ser minimalista, rápido y profesional.

No debe parecer una plantilla genérica de IA.

Inspiración conceptual:

```text
------------------------------------------------
                    LOGO
------------------------------------------------

Search tools...

------------------------------------------------

Popular Tools

[ JSON Formatter ] [ Image Compressor ]
[ QR Generator   ] [ Loan Calculator  ]

------------------------------------------------

Categories

Developer Tools
PDF Tools
Image Tools
Calculators
Text Tools
Converters

------------------------------------------------

Featured / Popular Tools

------------------------------------------------

Footer
------------------------------------------------
```

Utilizar diseño responsive.

Mobile-first.

Priorizar velocidad y Core Web Vitals.

---

# 5. Sistema de categorías

Crear categorías:

* Developer Tools
* Image Tools
* PDF Tools
* Calculators
* Converters
* Text Tools
* Generators

Cada categoría debe tener:

* nombre
* slug
* descripción
* icono
* estado activo

URL:

```text
/category/developer-tools
/category/image-tools
/category/calculators
```

---

# 6. Sistema de herramientas

Crear una tabla `tools`.

Campos mínimos:

```text
id
name
slug
description
short_description
category_id
icon
is_active
is_premium
ads_enabled
seo_title
seo_description
sort_order
created_at
updated_at
```

Cada herramienta debe tener:

* nombre
* slug
* descripción
* categoría
* SEO title
* SEO description
* icono
* estado
* soporte para anuncios
* soporte para Premium

El menú y las páginas de categorías deben generarse dinámicamente desde esta información.

---

# 7. URLs

Cada herramienta debe tener una URL limpia:

```text
/json-formatter
/image-compressor
/jpg-to-webp
/loan-calculator
/qr-generator
```

No utilizar:

```text
/tools?id=123
```

Las URLs deben estar optimizadas para SEO.

---

# 8. Sistema de publicidad

Crear componentes reutilizables:

```text
<x-ads.top />
<x-ads.sidebar />
<x-ads.bottom />
```

No colocar directamente el código de Google AdSense dentro de cada herramienta.

Crear una configuración central para Ads.

Por ejemplo:

```text
ADS_ENABLED=true
ADS_CLIENT_ID=
ADS_SLOT_TOP=
ADS_SLOT_BOTTOM=
ADS_SLOT_SIDEBAR=
```

Si `ADS_ENABLED=false`, los componentes no deben renderizar nada.

Debe ser posible activar/desactivar publicidad globalmente.

También debe poder desactivarse para herramientas Premium.

Ejemplo:

```php
@if($tool->ads_enabled && !$tool->is_premium)
    <x-ads.top />
@endif
```

No utilizar anuncios invasivos.

No bloquear la funcionalidad principal de las herramientas.

---

# 9. SEO

Cada herramienta debe generar automáticamente:

* `<title>`
* meta description
* canonical URL
* Open Graph title
* Open Graph description
* Open Graph image
* Twitter/X card

Crear:

```text
/sitemap.xml
/robots.txt
```

El sitemap debe incluir:

* homepage
* categorías
* herramientas activas

No incluir herramientas desactivadas.

Agregar Schema.org cuando tenga sentido.

Para cada herramienta utilizar `SoftwareApplication` o el tipo de schema más apropiado.

También incluir breadcrumbs.

---

# 10. Analytics

Preparar integración para Google Analytics / Google Tag Manager.

No hardcodear el código en cada herramienta.

Crear un componente:

```text
<x-analytics />
```

Debe poder desactivarse mediante configuración.

Registrar eventos importantes:

```text
tool_open
tool_use
tool_result
file_upload
file_download
premium_click
ad_click
```

No enviar información sensible de los usuarios.

---

# 11. Primera herramienta: JSON Formatter

URL:

```text
/json-formatter
```

Funcionalidad:

* textarea para JSON
* Format
* Minify
* Validate
* Copy
* Clear

Opcional:

* JSON → CSV
* JSON → TypeScript

El procesamiento debe realizarse en el navegador.

No enviar JSON al servidor.

Debe funcionar sin cuenta.

SEO:

Title:

```text
JSON Formatter & Validator Online
```

---

# 12. Segunda herramienta: Image Compressor

URL:

```text
/image-compressor
```

Permitir:

* JPG
* JPEG
* PNG
* WebP

Funcionalidades:

* drag & drop
* selección de archivos
* preview
* tamaño original
* tamaño comprimido
* porcentaje de reducción
* calidad configurable
* descarga

Cuando sea posible, procesar las imágenes completamente en el navegador.

No subir imágenes al servidor si no es necesario.

Límite razonable de tamaño de archivo.

Permitir procesamiento múltiple si es viable.

---

# 13. Tercera herramienta: JPG → WebP

URL:

```text
/jpg-to-webp
```

Funcionalidades:

* upload
* drag & drop
* preview
* quality
* conversion
* download

Procesamiento client-side cuando sea posible.

Agregar soporte para múltiples imágenes.

Crear opción:

```text
Download All
```

cuando haya múltiples archivos.

---

# 14. Cuarta herramienta: Loan Calculator

URL:

```text
/loan-calculator
```

Inputs:

* loan amount
* interest rate
* loan term
* payment frequency

Resultados:

* payment
* total interest
* total paid

Agregar tabla de amortización.

Debe soportar:

* monthly
* biweekly
* weekly

Todo debe calcularse en JavaScript.

Agregar disclaimer:

```text
This calculator provides estimates for informational purposes only.
Actual loan terms may vary by lender.
```

---

# 15. Quinta herramienta: QR Generator

URL:

```text
/qr-generator
```

Permitir generar QR para:

* URL
* text
* email
* phone
* WiFi

Opciones:

* tamaño
* margen
* foreground color
* background color

Descarga:

* PNG
* SVG

No requerir cuenta.

---

# 16. Página de cada herramienta

Todas las herramientas deben seguir una estructura común:

```text
Breadcrumb

Title

Description

Advertisement

Tool Interface

Result

Advertisement

How to use

FAQ

Related Tools
```

Ejemplo:

```text
JSON Formatter

Format and validate JSON directly in your browser.

[ AD ]

┌─────────────────────────────┐
│                             │
│ Paste your JSON here...     │
│                             │
└─────────────────────────────┘

[ Format ] [ Minify ] [ Clear ]

[ AD ]

How to use JSON Formatter
1. Paste your JSON
2. Click Format
3. Copy the formatted result

FAQ

Related Tools
```

---

# 17. Related Tools

Cada herramienta debe mostrar automáticamente herramientas relacionadas.

Por ejemplo:

JSON Formatter:

```text
Related Tools

JSON → CSV
UUID Generator
JWT Decoder
Base64 Encoder
```

La relación debe basarse inicialmente en categoría.

Posteriormente puede agregarse un sistema manual de relaciones.

---

# 18. Homepage

La homepage debe mostrar:

### Hero

```text
Free Online Tools

Simple tools that help you get things done faster.

[ Search tools... ]
```

### Popular tools

Mostrar las herramientas con mayor `sort_order` inicialmente.

Posteriormente permitir ordenar por uso.

### Categories

Mostrar todas las categorías activas.

### Recently added

Mostrar las herramientas nuevas.

---

# 19. Performance

Prioridad alta.

Evitar:

* librerías innecesarias
* JavaScript pesado
* imágenes grandes
* dependencias que puedan evitarse
* llamadas API innecesarias

Las herramientas client-side deben cargar únicamente el JavaScript necesario.

No cargar las dependencias de PDF en una página que solamente utiliza JSON Formatter.

Utilizar lazy loading cuando corresponda.

---

# 20. Seguridad

Implementar:

* CSRF
* rate limiting para endpoints
* validación de archivos
* validación MIME
* límites de tamaño
* sanitización
* protección contra XSS
* protección contra subida de archivos peligrosos

Las herramientas que no necesitan backend no deben tener endpoints innecesarios.

---

# 21. Monetización futura

Preparar la arquitectura para:

### Free

```text
Ads
Basic functionality
```

### Pro

```text
No ads
Larger files
Batch processing
Advanced features
```

No implementar pagos todavía.

Solamente dejar la arquitectura preparada.

---

# 22. Admin

Inicialmente NO construir un panel administrativo complejo.

La primera versión puede utilizar:

* database seeder
* configuración
* código

Posteriormente crear un `/admin` para:

* activar/desactivar herramientas
* editar SEO
* cambiar categorías
* cambiar orden
* activar/desactivar Ads

No perder tiempo construyendo el CMS antes de validar tráfico.

---

# 23. Base de datos inicial

Crear seeders para:

Categories:

```text
Developer Tools
Image Tools
PDF Tools
Calculators
Converters
Text Tools
Generators
```

Tools:

```text
JSON Formatter
Image Compressor
JPG to WebP
Loan Calculator
QR Generator
```

---

# 24. Diseño de código

Cada herramienta debe estar aislada.

No crear un gigantesco `ToolController` con cientos de `if`.

Preferir:

```text
Tools/
├── JsonFormatter/
├── ImageCompressor/
├── JpgToWebp/
├── LoanCalculator/
└── QrGenerator/
```

Si una herramienta crece, debe poder evolucionar sin afectar las demás.

---

# 25. Reglas importantes

1. No crear funcionalidades que no sean necesarias para el MVP.
2. No crear autenticación todavía.
3. No crear pagos todavía.
4. No crear dashboard complejo todavía.
5. No crear una API pública todavía.
6. No subir archivos al servidor si pueden procesarse client-side.
7. No utilizar React si Blade + Alpine son suficientes.
8. Priorizar SEO.
9. Priorizar velocidad.
10. Mantener cada herramienta independiente.
11. Escribir código limpio y mantenible.
12. No duplicar lógica.
13. Crear componentes reutilizables.
14. Crear tests para las partes críticas.
15. Toda nueva herramienta debe poder agregarse sin modificar herramientas existentes.

---

# 26. Orden de implementación

Implementar en este orden:

### Fase 1

Laravel + Tailwind + Vite.

### Fase 2

Layout general.

### Fase 3

Sistema de categorías.

### Fase 4

Sistema de herramientas.

### Fase 5

Homepage.

### Fase 6

SEO.

### Fase 7

Ads components.

### Fase 8

Analytics.

### Fase 9

JSON Formatter.

### Fase 10

Image Compressor.

### Fase 11

JPG → WebP.

### Fase 12

Loan Calculator.

### Fase 13

QR Generator.

### Fase 14

Sitemap + robots.txt.

### Fase 15

Performance optimization.

### Fase 16

Tests.

---

# 27. Criterio de éxito del MVP

El MVP está terminado cuando:

* Homepage funciona.
* Categorías funcionan.
* Las 5 herramientas funcionan.
* Cada herramienta tiene SEO propio.
* Ads pueden activarse/desactivarse globalmente.
* Analytics puede activarse/desactivarse.
* Sitemap funciona.
* Responsive funciona.
* No existen errores de consola.
* No existen errores PHP.
* Las herramientas client-side no suben archivos innecesariamente al servidor.
* Lighthouse tenga un buen resultado de performance.
* Agregar una sexta herramienta sea sencillo.

---

# 28. Después del MVP

NO construir inmediatamente otras 30 herramientas.

Primero lanzar.

Después agregar herramientas progresivamente:

```text
Developer
├── UUID Generator
├── JWT Decoder
├── Base64 Encoder
├── URL Encoder
├── JSON → CSV
└── CSV → JSON

Image
├── Resize Image
├── Crop Image
├── PNG → WebP
├── WebP → JPG
└── Image to PDF

PDF
├── Merge PDF
├── Split PDF
├── PDF → JPG
└── JPG → PDF

Calculators
├── Percentage
├── Age
├── Tip
├── Compound Interest
└── Salary
```

La prioridad debe determinarse posteriormente mediante tráfico, búsquedas y uso real.

---

# Instrucción final para Claude

No generes todo el proyecto de una sola vez si eso compromete la calidad.

Construye el proyecto por fases.

Después de cada fase:

1. Verifica que compile.
2. Ejecuta tests relevantes.
3. Revisa errores.
4. Explica brevemente qué se implementó.
5. Continúa con la siguiente fase.

Antes de escribir código, revisa la arquitectura completa y detecta posibles problemas.

Si alguna decisión técnica de este documento es innecesariamente compleja, simplifícala siempre que no afecte la escalabilidad.

El objetivo principal es:

**Un portal rápido, SEO-friendly y fácil de extender con decenas de mini herramientas independientes que puedan monetizarse mediante Ads y posteriormente Premium.**


Una recomendación adicional

Yo no empezaría comprando un dominio ni metiendo AdSense inmediatamente. Primero construiría las 5 herramientas, las pondría en producción y comprobaría que realmente funcionan bien.

Después agregaría las siguientes 15–20 herramientas basándome en búsquedas reales.

Y hay una modificación que haría respecto al plan: si quieres maximizar tus posibilidades de ingresos, probablemente conviene que el portal sea en inglés, aunque estés en Costa Rica. El mercado potencial para herramientas como JSON Formatter, JPG to WebP, PDF Merge o Image Compressor es mucho mayor que hacerlas solamente en español. Puedes añadir español posteriormente sin duplicar la aplicación.