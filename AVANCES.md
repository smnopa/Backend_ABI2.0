# Avances del Módulo de Formatos

## Estado general

El módulo de **Formatos** está en desarrollo activo. Actualmente cubre tres formatos principales:

- Acta de Reunión ✅
- Ideas de Estudiante ✅
- Ficha de Propuesta ✅

---

## Aportes por integrante

### smnopa (Samy Bautista)

**Scaffolding completo del módulo de formatos** — _24 de abril de 2026_

Creó la estructura base del módulo completo:

- **Controladores CRUD** para los tres formatos: `FormatoActaReunionController`, `FormatoIdeasEstudianteController`, `FormatoFichaPropuestaController`
- **Modelos** `ActaReunion`, `IdeasEstudiante` y `FichaPropuesta` con SoftDeletes y relaciones base
- **Migraciones** con campos y claves foráneas para las tres tablas
- **13 vistas Blade** — hub de formatos + vistas index, create, edit y show por cada formato
- **Rutas** registradas en `routes/web.php` con control de acceso por rol
- Sección **Formatos** agregada al menú lateral (`config/tablar.php`)
- Documento `FORMATOS.md` con guía de desarrollo para el equipo

---

### sslcristian (Cristian)

**Módulo Acta de Reunión funcional completo** — _24 de abril de 2026_

Tomó el scaffolding base del Acta de Reunión y lo llevó a un módulo completamente funcional:

- Reescribió el **Controlador** con lógica completa de creación, edición, eliminación y validaciones
- Expandió el **Modelo** `ActaReunion` con relaciones, campos fillable y scopes necesarios
- Actualizó la **migración** con la estructura de tabla definitiva
- Refactorizó las vistas `create`, `edit`, `index` y `show` con formularios funcionales
- Creó `form.blade.php` como componente de formulario reutilizable entre crear y editar
- Creó `pdf.blade.php` para la generación del PDF del acta
- Añadió la ruta del PDF en `routes/web.php`

---

### Estudiante 2

**Módulo Ideas de Estudiante funcional completo** — _25 de abril de 2026_

Tomó el scaffolding base de Ideas de Estudiante y lo llevó a un módulo completamente funcional:

- Reescribió el **Controlador** con lógica completa (CRUD, validaciones, manejo de checkboxes, filtro por usuario autenticado)
- Actualizó el **Modelo** `IdeasEstudiante` con los campos reales del formato físico y relación con `User`
- Reescribió la **migración** con la estructura definitiva: título, docente, concepto (aprobada/no aprobada), 4 criterios booleanos, observaciones, N° acta y VoBo
- Creó `form.blade.php` como componente reutilizable entre crear y editar
- Refactorizó las vistas `create`, `edit`, `index` y `show` siguiendo el estándar del proyecto

---

### Estudiante 3

**Módulo Ficha de Propuesta funcional completo** — _25 de abril de 2026_

Tomó el scaffolding base de Ficha de Propuesta y lo llevó a un módulo completamente funcional:

- Reescribió el **Controlador** con lógica completa de CRUD y validaciones por sección
- Creó el **Modelo** `FichaPropuesta` con relaciones a `Professor`, `InvestigationLine` y `ThematicArea`
- Creó la **migración** con estructura de 5 secciones: Información General, Datos del Tema, Objetivos, Pertinencia y Viabilidad, Descripción y Contexto
- Creó las vistas `index`, `create`, `edit` y `show` con formulario organizado en tarjetas por sección

---

## Pendiente

- [ ] Generación de PDF para Ideas de Estudiante
- [ ] Generación de PDF para Ficha de Propuesta
- [ ] Selector de Programa en Ficha de Propuesta (poblar dinámicamente desde BD)
- [ ] Migraciones ejecutadas y probadas en entorno compartido
