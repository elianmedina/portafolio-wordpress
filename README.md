# Portafolio Personal con WordPress

Este proyecto es un sitio informativo tipo portafolio, desarrollado con WordPress, Elementor, un Child Theme basado en Hello Elementor y plugins específicos.

---

## 📋 Requisitos del Entorno Local

- **WordPress 6.x (recomendado 6.5.3 o superior)**
- **XAMPP (PHP 7.4 o superior, MySQL)**
- **Composer (para librerías PHP externas)**

---

## 🚀 Instalación del Proyecto (Local con XAMPP)

1. **Clonar repositorio:**

   ```bash
   git clone https://github.com/tu_usuario/portfolio-wordpress.git
   ```

2. **Instalar Child Theme:** Copia la carpeta del child theme (`theme/portfolio-child-theme`) en:

   ```
   C:\xampp\htdocs\wordpress\wp-content\themes\
   ```

3. **Instalar Plugins Personalizados:** Copia las carpetas desde `plugins/` en:

   ```
   C:\xampp\htdocs\wordpress\wp-content\plugins\
   ```

4. **Instalar dependencias con Composer:** (para el plugin Carbon)

   ```bash
   cd C:\xampp\htdocs\wordpress\wp-content\plugins\carbon-demo-plugin
   composer require nesbot/carbon
   ```

5. **Importar la base de datos:** Importa `database/export.sql` desde phpMyAdmin.

6. **Configurar base de datos:** En `wp-config.php`:

   ```php
   define('DB_NAME', 'nombre_db');
   define('DB_USER', 'root');
   define('DB_PASSWORD', '');
   define('DB_HOST', 'localhost');
   ```

7. **Acceso al sitio:**

   ```
   http://localhost/wordpress/
   ```

---

## 🖌️ Enfoque de Diseño y Desarrollo

- **Tema:** Child theme basado en Hello Elementor.
- **Diseño responsive y accesible:** HTML5 semántico, alto contraste, adaptado a móviles.
- **CSS Personalizado:** Fuente "Gafata", estilos consistentes para cards, botones, formularios.
- **Animaciones sutiles:** Efectos hover en cards y botones.

---

## 🧩 Plugins Utilizados, Instalación y Justificación

### 🟢 Plugins Externos (Instalar desde `Plugins > Añadir nuevo` en WordPress)

| Plugin                     | Instalación                     | Uso                                         |
| -------------------------- | ------------------------------- | ------------------------------------------- |
| **Elementor**              | Buscar "Elementor"              | Maquetación visual rápida y responsive.     |
| **Contact Form 7**         | Buscar "Contact Form 7"         | Formulario sencillo y funcional.            |
| **Advanced Custom Fields** | Buscar "Advanced Custom Fields" | Crear campos personalizados para proyectos. |
| **Custom Post Type UI**    | Buscar "Custom Post Type UI"    | Crear tipos de contenido personalizados.    |
| **The Plus Addons**        | Buscar "The Plus Addons"        | Extensiones adicionales para Elementor.     |
| **Display Post Types**     | Buscar "Display Post Types"     | Mostrar tipos de contenido personalizados.  |     |

### 🔵 Plugins Personalizados

| Plugin                              | Instalación                             | Uso                                                  |
| ----------------------------------- | --------------------------------------- | ---------------------------------------------------- |
| **Filtro de Proyectos (AJAX)**      | Copiar carpeta en `plugins/`            | Filtrado dinámico de proyectos por categoría (AJAX). |
| **Demo Carbon Composer Plugin**     | Copiar carpeta en `plugins/` + Composer | Ejemplo uso de librería externa (Carbon).            |
| **Mostrar Proyectos Personalizado** | Copiar carpeta en `plugins/`            | Mostrar proyectos con estilos personalizados.        |

---

## 📂 Estructura del Sitio

- **Inicio:** Presentación breve.
- **Proyectos:** Listado con filtrado AJAX por categorías.
- **Contacto:** Formulario funcional estilizado.

---

## 📸 Capturas de Pantalla

### Sobre Mí

**Presentación personal en versión escritorio:**  
<img src="assets/Captura%201%20Sobre%20Mi.png" alt="Presentación personal Escritorio" width="100%"/>

**Sección de tecnologías y estudios (desktop):**  
<img src="assets/Captura%202%20Sobre%20Mi.png" alt="Tecnologías y estudios Escritorio" width="100%"/>

**Vista responsiva de la sección 'Sobre mí' en móvil:**  
<img src="assets/Captura%203%20Sobre%20Mi.png" alt="Sobre mí Móvil" width="350"/>

---

### Proyectos

**Portafolio de proyectos (versión escritorio):**  
<img src="assets/Captura%204%20Proyectos.png" alt="Portafolio Proyectos Escritorio" width="100%"/>

**Filtrado de proyectos por categoría, resaltando categoría activa:**  
<img src="assets/Captura%205%20Proyectos.png" alt="Filtrado Proyectos Categoría" width="100%"/>

---

### Contacto

**Página de contacto responsiva:**  
<img src="assets/Captura%206%20Contacto.png" alt="Contacto Móvil" width="350"/>

**Formulario de contacto funcional y accesible:**  
<img src="assets/Captura%207%20Contacto.png" alt="Formulario Contacto" width="100%"/>

---

## 💡 Decisiones Técnicas Clave

- **Child Theme:** Actualizaciones seguras y personalización avanzada.
- **Composer (Carbon):** Uso profesional de dependencias externas.
- **Filtros AJAX:** Mejora de la experiencia de usuario sin recarga de página.

---

## 📌 Autor

- **Elián Medina** ([elian.medina.naranjo@gmail.com](mailto\:elian.medina.naranjo@gmail.com))

