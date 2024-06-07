# Test de Conocimientos Generales para Desarrollador Fullstack Junior

Proyecto de ejemplo

## Instalación

Clone el repositorio hacia un directorio de su elección y **Cambie al directorio**:
```
cd [nombre del directorio]
```

Ejecute los siguientes comandos
```
composer install
```

## Iniciar la aplicación

Abra una terminal y ejecute el siguiente comando:

```
symfony server:start
```

## Sección 1: Symfony

1. **Pregunta de Configuración:**

Describe los pasos básicos para levantar un proyecto en Symfony.

- Cree el proyecto usando el CLI de Symfony:

```
symfony new [nombre del proyecto] --webapp
```

- Asegurese de tener todas las extensiones de PHP necesarias instaladas.
- Use el gestor de paquetes de PHP "Composer" para instalar todos los paquetes que necesite.
- Cree un fichero .env.local donde debe establecer los parámetros de configuración para el entorno de desarrollo local.
- Cree entidades, controladore y servicios, plantillas, etc. necesarios.
- Desde la raiz del proyecto ejecute el servidor de desarrollo para acceder a la aplicación:

```
symfony server:start
```

2. **Pregunta de Código:**

Crea un controlador en Symfony que maneje una ruta /hello/{name} y devuelva un saludo personalizado. Además, si el nombre no se proporciona, debe devolver un saludo predeterminado "Hello World". (opcional) Implementa también una prueba unitaria para verificar que la ruta devuelve el saludo correcto.


- Ver el controlador `HelloController`

3. **Pregunta Teórica:**

Explica la arquitectura de Symfony y cómo se organiza un proyecto típico en términos de carpetas y archivos.

>Symfony sigue una arquitectura MVC.
> 
> Un proyecto típico tiene las siguiente estructura:
> * **bin**: Contiene scripts ejecutables utilitarios.
> * **config**: Contiene los ficheros de configuración
>   * **packages**: Contiene configuración de paquetes instalados.
>   * **routes**: Contiene información de ruteo en formato yaml
>   * **services.yaml**: Contiene configuración para la resolución de servicios por Inyección de dependencias
> * **public**: Contiene los recursos de acceso público como hojas de estilo, imágenes y scripts JavaScript. 
    Así como el controlador frontal de entrada a toda la aplicación.
> * **src**: Contiene el código fuente de la aplicación.
>   * **Controller**: Contiene los Controladores.
>   * **Entity**: Contiene las clases persistentes.
> * **templates**: Contiene las plantillas twig.
> * **var**: Contiene ficheros temporales como la cache y logs.
> * **vendor**: Contiene los paquetes, dependencias externas de la aplicación.
> * **.env**: Ficheros donde se establecen valores para los parámetros de configuración específicos
> para diferentes entornos: producción, pruebas, desarrollo; .env.prod, .env.test, .env.dev respectivamente.
> * **composer.json**: Fichero de configuración de composer para el proyecto.
> * **composer.lock**: Fichero de configuración de composer que registra la versión de las dependencias instaladas.
> 

4. **Pregunta de Código:**

Escribe un servicio en Symfony que se inyecta en un controlador y realiza una operación matemática básica (por ejemplo, sumar dos números). ¿Qué configuraciones son necesarias para poder usarlo? (opcional) Implementa también una prueba unitaria para verificar el correcto funcionamiento del servicio.

> Creado el servicio `App\Service\SumCalculator`. Se puede probar su uso accediendo a la ruta `/sum/{primero}/{segundo}`.
> En este caso usando Symfony 7 no es necesario hacer ninguna configuración adicional. En caso de versiones anteriores puede ser necesario
> establecer una configuración en el fichero `/config/services.yaml` similar a esta:
> 
> ```yml
> App\Service\:
>        public: true
>        resource: '../src/Service/*'
> ```

5. **Pregunta de Código:**

Muestra cómo crear un formulario en Symfony para una entidad User con campos username y email.

> Creada la entidad `App\Entity\User`, el form type `App\Form\Type\UserType`, el controlador `App\Controller\UserController`
> y la plantilla `templates/user/new.html.twig`
> Se puede probar su uso accediendo a la ruta `/user/new`.

6. **Pregunta Teórica:**

Explica el concepto de Dependency Injection (DI) en Symfony y cómo se configura.

> Dependency Injection es un patrón de diseño que permite gestionar las dependencias entre las clases. 
> Las dependencias de una clase se inyectan en ella en lugar de ser creadas dentro de la misma clase. 
> Para ello Symfony utiliza un contenedor de servicios que se encarga de instanciar y administrar los servicios de la aplicación.
>
> Para configurar la inyección de dependencias se usa el fichero `services.yaml` donde se establece la configuración sobre la ubicación de los
> servicios, así como los parámetros necesarios durante su instanciación.

7. **Pregunta de Código:**

Escribe una consulta Doctrine en Symfony para obtener todos los registros de una entidad Product donde el precio sea mayor a 100.

En DQL:
```dql
SELECT e FROM Product e WHERE e.precio > 100
```

Usando el QueryBuilder de Doctrine:
```php
/**
* @var $em EntityManager
*/
$results = $em->createQueryBuilder()
            ->from(Product::class, 'e')
            ->where('e.precio > 100')
            ->select(e)
            ->getQuery()->getArrayResult();
```

8. **Pregunta Teórica:**

¿Qué es el Event Dispatcher en Symfony y para qué se utiliza?

> El Event Dispatcher de Symfony es el componente que se encarga de la propagación de eventos en la aplicación. 
> Permite la comunicación entre diferentes componentes de una aplicación mediante la emisión y escucha de eventos. Los eventos son desencadenados en ciertos puntos clave de la ejecución de la aplicación y pueden ser capturados y procesados por otros componentes. 
> Proporciona un mecanismo flexible y desacoplado para la comunicación entre componentes, lo que facilita la extensibilidad y modularidad de la aplicación. Permite que diferentes partes de la aplicación respondan de forma independiente a eventos específicos sin conocer los detalles de implementación de los demás componentes.

9. **Pregunta de Código:**

Crea un validador personalizado en Symfony para asegurar que el campo email de una entidad User no pertenece a un dominio específico (por ejemplo, "example.com"). Muestra cómo configurar este validador y cómo sería utilizado en la entidad User.

> Se creo el servicio de validación `App\Validator\EmailDomainValidator` y se agregó al fichero `services.yaml`.
> Se agregó `App\Validator\Constraints\EmailDomain` y se estableció el servicio encargado de validarla.
> Se aplicó el validador al campo `email` de la entidad `App\Entity\User`.

10. **Pregunta de Código:**

Implementa un Event Subscriber en Symfony que escuche el evento kernel.request y registre en un archivo de log cada visita a cualquier página de la aplicación. Asegúrate de configurar el servicio correctamente para que el suscriptor se registre con el evento.

> Creada la clase `App\EventSubscriber\RequestLoggerSubscriber` y se agregó al fichero `services.yaml`.

## Sección 2: JavaScript

1. **Pregunta Teórica:**

Explica la diferencia entre var, let y const en JavaScript.

> * var: Las variables declaradas con `var` tienen un ámbito global o local.
> pueden declararse varias veces dentro del mismo ámbito sin que de error.
> Las declaraciones con var se elevan a la parte superior de su ámbito y se inicializan con un valor `undefined`.
> * let: Tiene ámbito de bloque, pueden modificarse pero no volverse a declarar.
> Si se intenta usar una variable antes de declararla no se obtiene `undefined` sino un error de referencia.
> * const: Tienen ámbito de bloque, no pueden modificarse ni volverse a declarar, debe ser inicializada
> en el momento de la declaración. Al igual que `let` no se pueden usar antes de su declaración pues
> provoca un error de referencia.

2. **Pregunta de Código:**

Escribe una función en JavaScript que invierta una cadena de texto.

> Con métodos de JavasSript:
>
> ```javascript
> function invertirCadena(cad) {
> return cad.split("").reverse().join("");
> }
> ```
> Iterando con un ciclo for:
> ```javascript
> function invertirCadena(cad) {
>    var nuevaCadena = "";
>    for (var i = cad.length - 1; i >= 0; i--) {
>        nuevaCadena += cad[i];
>    }
>    return nuevaCadena;
> }
> ```
> 
> Usando recursividad:
> ```javascript
> function invertirCadena(cad) {
>   if (cad === "")
>       return "";
>   else
>       return invertirCadena(cad.substr(1)) + cad.charAt(0);
> }
> ```

3. **Pregunta Teórica:**

¿Qué es el Event Loop en JavaScript y cómo funciona?

> El Event loop es un bucle interno de JavaScript que se encarga de manejar la cola de tareas pendientes y ejecutarlas de manera secuencial. 
> Estas tareas pueden ser funciones, eventos o cualquier otro tipo de acción que necesite ser ejecutada.
> Las llamadas a función forman una pila de frames. 
> Un frame encapsula información como el contexto y las variables locales de una función.
> Un programa en ejecución en JavaScript contiene una cola de mensajes, la cual es una lista de mensajes a ser procesados.
> Cada mensaje es procesado completamente antes que cualquier otro mensaje sea procesado.
> En los navegadores web, los mensajes son añadidos cada vez que un evento ocurre y hay un escuchador de eventos asociado a él.
> Una propiedad muy interesante del modelo de loop de eventos es que JavaScript, a diferencia de otros lenguajes, nunca interrumpe otros programas en ejecución. 
> Manejar operaciones de I/O (entrada/salida) es normalmente hecho a través de eventos y llamadas a función, de modo que cuando la aplicación, por ejemplo, está esperando por el retorno de una consulta IndexedDB o una petición XHR, ésta puede continuar procesando otras cosas como interacciones con el usuario.

4. **Pregunta de Código:**

Escribe un script en JavaScript que filtre los números pares de un array de números y los muestre en la consola.

```javascript
// Función que filtra los números pares
function filterEvenNumbers(arr) {
    // Utilizamos el método filter() para crear un nuevo array con los números pares
    const evenNumbers = arr.filter(num => num % 2 === 0);

    // Mostramos los números pares en la consola
    console.log(evenNumbers);
}
```

5. **Pregunta Teórica:**

¿Qué es el DOM y cómo se manipula usando JavaScript?

> El DOM (Document Object Model) es una representación jerárquica del documento HTML o XML que se carga en el navegador. 
> Permite a los programas y scripts acceder y actualizar el contenido, la estructura y el estilo de un documento web.
> El DOM puede ser manipulado a traves del objeto `document` y los atributos y funciones que proporciona tales como: 
> `document.getElementById`, `element.innerHTML`, `element.getAttribute`, `element.style.property`, etc.

6. **Pregunta de Código:**

Escribe un código en JavaScript que añada un event listener a un botón con el id #myButton para mostrar una alerta con el mensaje "Hello World" al hacer clic.

En JavaScript:
```javascript
document.getElementById("myButton")
        .addEventListener("click", () => alert("Hello World"), false);
```
Usando jQuery:
```javascript
$("#myButton").on("click", () => alert("Hello World"));
```

7. **Pregunta Teórica:**

Explica qué es una Promesa en JavaScript y proporciona un ejemplo básico.

> En JavaScript, una Promesa (Promise) es un objeto que representa la finalización o el fracaso de una operación asincrónica.
> 
> Ejemplo:
> ```javascript
> // Creamos una nueva Promesa
> const myPromise = new Promise((resolve, reject) => {
>   // Simulamos una operación asincrónica
>   setTimeout(() => {
>       // Si la operación se completa con éxito, llamamos a resolve()
>       resolve('¡Operación completada con éxito!');
>
>       // Si la operación falla, llamamos a reject()
>       // reject('¡Error en la operación!');
>   }, 2000);
> });
> 
> // Usamos la Promesa
> myPromise
>   .then(result => {
>       console.log(result);
>   })
>   .catch(error => {
>       console.error(error);
>   });
> ```

8. **Pregunta de Código:**
- Escribe una función en JavaScript que haga una petición AJAX (usando fetch) para obtener datos de una API y los muestre en un elemento con el id #result.

```javascript
/**
 * Obtiene la suma de dos numeros pasados como parámetros usando el método previamente implementado en /sum/{first}/{second}
 * @param first
 * @param second
 */
function fetchSum(first, second) {
    fetch("\\sum\\" + first + "\\" + second)
        .then(function (response) {
            if (response.ok) {
                response.json()
                        .then(function (json) {
                            document.getElementById("result").innerHTML = json.value;
                        });
            } else {
                console.log("Respuesta de red OK pero respuesta HTTP no OK");
            }
        })
        .catch(function (error) {
            console.log("Hubo un problema con la petición Fetch:" + error.message);
        });
}
```

9. **Pregunta Teórica:**

¿Cuál es la diferencia entre null, undefined y NaN en JavaScript?

> * **undefined**: Una variable que ha quedado sin definir tiene un valor especial denominado **undefined**.
> Es un tipo de dato y por lo tanto se puede consultar con typeof. No es una palabra reservada y se puede usar como
> nombre de una variable, lo que no es recomendable.
> Además existe una variable global que contiene este valor y que se denomina también **undefined**.
> * **null**: Es un literal definido en la especificación del lenguaje, no una variable global como en el caso **undefined**, 
> por lo tanto, es una palabra reservada y no podremos utilizarla como nombre de variable. El tipo para el valor **null** es object.
> * **NaN** (Not a Number): Es un valor numérico especial, cualquier operación con el devuelve **NaN**. También hay una variable global con nombre 
> **NaN**.

10. **Pregunta de Código:**

Implementa una función en JavaScript que use localStorage para guardar una clave-valor y luego recuperarla.

```javascript
/**
 * Guarda un valor en el local storage, luego lo recupera y lo imprime en la consola.
 * @param clave
 * @param valor
 */
function guardarEnLocalStorage(clave, valor) {
    localStorage.setItem(clave, valor);
    let retrieved = localStorage.getItem(clave);
    console.log(retrieved);
}
```

## Sección 3: Git

1. **Pregunta Teórica:**

¿Qué es Git y para qué se utiliza en el desarrollo de software?

> Git es un sistema de control de versiones, nos sirve para trabajar en equipo de una manera mucho más simple y optima.
> Permite controlar todos los cambios que se hacen en la aplicación y en el código y tener control absoluto de todo lo que pasa en el código, 
> pudiendo volver atrás en el tiempo, pudiendo abrir diferentes ramas de desarrollo, etc. 
> Vamos a poder trabajar en equipo de una manera muy sencilla y optimizada, de forma que si tenemos dos o tres personas trabajando en ciertas funcionalidades del proyecto y nosotros podemos estar trabajando en nuestra parte del código. Cuando acabamos de desarrollar nuestro código, utilizamos Git para mezclar los cambios con los otros compañeros. De forma que el código se mezcla de manera perfecta sin generar ningún tipo de fallo y de forma rápida. 
> También nos va a proporcionar un listado de los cambios(commits) y podemos volver atrás en el tiempo a cualquiera de esos cambios o commits.
> Además tendremos la posibilidad de trabajar con ramas de desarrollo, que nos van a permitir desarrollar cosas que divergen mucho del programa principal.

2. **Pregunta de Comandos:**

¿Cuál es el comando para clonar un repositorio de Git?

```
git clone <URL_DEL_REPOSITORIO_REMOTO>
```

3. **Pregunta Teórica:**

Explica qué es un "branch" (rama) en Git y para qué se utiliza.

>  Git no almacena los datos de forma incremental (guardando solo diferencias), sino que los almacena como una serie de instantáneas (copias puntuales de los archivos completos, 
> tal y como se encuentran en ese momento). En cada confirmación de cambios (commit), Git almacena una instantánea de tu trabajo preparado. 
> Dicha instantánea contiene además unos metadatos con el autor y el mensaje explicativo, y uno o varios apuntadores a las confirmaciones (commit) que sean padres directos de esta 
> (un padre en los casos de confirmación normal, y múltiples padres en los casos de estar confirmando una fusión (merge) de dos o más ramas).
> 
> Una rama Git es simplemente un apuntador móvil apuntando a una de esas confirmaciones. 
> La rama por defecto de Git es la rama (master o main). Con la primera confirmación de cambios que realicemos, se creará esta rama principal master apuntando a dicha confirmación. 
> En cada confirmación de cambios que realicemos, la rama irá avanzando automáticamente.
> 
> Las ramas se usan cuando en el proyecto se encuentren muchos usuarios que necesiten acceso a los archivos del proyecto, como cada rama es un entorno independiente, 
> cada usuario podrá modificar los archivos según sea necesario y no altere los archivos de los demás usuarios en sus respectivas Ramas. Permite desarrollar nuevas funcionalidades,
> resolver errores o liberar versiones sin afectar el trabajo de otros desarrolladores.

4. **Pregunta de Comandos:**

Proporciona los comandos necesarios para crear una nueva rama llamada feature-xyz, cambiar a esa rama, y luego fusionarla con la rama main.

> 1. En caso de que no se encuentre en la rama main:
> ```
> git checkout main
> ```
> 2. Crea una nueva rama llamada "feature-xyz":
> ```
> git branch feature-xyz
> ```
> 3. Cambia a la nueva rama "feature-xyz":
> ```
> git checkout feature-xyz
> ```
> 4. Realiza los cambios y commits necesarios en la rama "feature-xyz".
> 5. Cambia a la rama principal:
> ```
> git checkout main
> ```
> 6. Fusiona la rama "feature-xyz" con la rama principal:
> ```
> git merge feature-xyz
> ```

5. **Pregunta Teórica:**

¿Qué es un "merge conflict" y cómo se resuelve?

> Un "merge conflict" (conflicto de fusión) ocurre cuando Git encuentra diferencias entre las ramas que intentas fusionar y no puede determinar automáticamente cómo combinar esos cambios. 
> Esto puede suceder si diferentes partes del código fueron modificadas en ambas ramas o si hay cambios conflictivos en el mismo archivo. 
> 
> Para resolver un conflicto de fusión, puedes seguir estos pasos:
> 
> 1. Ejecutar el comando git status para ver qué archivos tienen conflictos. 
> 2. Abrir los archivos con conflicto en un editor de texto. Dentro de los archivos, se pueden ver secciones marcadas con <<<<<<<, =======, y >>>>>>>, que representan las diferencias entre las versiones. 
> 3. Editar manualmente los archivos con conflictos para seleccionar qué cambios mantener. Eliminar las marcas de conflicto (<<<<<<<, =======, >>>>>>>) y dejar solo el código que a conservar. 
> 4. Una vez que se hayan resuelto los conflictos en todos los archivos, ejecutar el comando git add <archivo> para marcar los archivos como resueltos. 
> 5. Si hay varios archivos con conflictos, repetir los pasos 3 y 4 para cada archivo. 
> 6. Luego de marcar todos los archivos como resueltos, ejecuta el comando git commit para completar el proceso de fusión.

6. **Pregunta de Comandos:**

¿Cuál es el comando para visualizar el estado actual del repositorio en Git?

```
 git status
```

7. **Pregunta Teórica:**

Explica la diferencia entre git pull y git fetch.

> * **git fetch**: Descarga los últimos cambios del repositorio remoto al repositorio local sin aplicar automáticamente ninguna fusión (merge) o rebase a las ramas locales. 
> Los cambios descargados se almacenan copias locales de las ramas remotas. 
> Con git fetch, se pueden ver los cambios descargados y compararlos con las ramas locales antes de decidir cómo combinarlos. 
> * **git pull**: Realiza dos acciones en secuencia: primero, ejecuta git fetch para obtener las últimas actualizaciones del repositorio remoto, y luego realiza automáticamente una fusión (merge) o rebase de los cambios descargados en la rama actual.

8. **Pregunta de Comandos:**

¿Cuál es el comando para revertir el último commit en Git?

```
git revert HEAD
```

9. **Pregunta Teórica:**

¿Qué es un "remote repository" y cómo se configura en Git?

> Un "remote repository" (repositorio remoto) en Git es un repositorio alojado en un servidor remoto, 
> que actúa como una copia centralizada del proyecto Git. Permite a los colaboradores compartir y sincronizar su trabajo en un proyecto.
> 
> Para configurar un repositorio remoto en Git, se utiliza el comando git remote.
> * Agregar el repositorio remoto y asignarle un nombre (por ejemplo, "origin"):
> ```
> git remote add <NOMBRE_DEL_REPOSITORIO_REMOTO> <URL_DEL_REPOSITORIO_REMOTO>
> ```
> * Eliminar un repositorio remoto:
> ```
> git remote remove <NOMBRE_DEL_REPOSITORIO_REMOTO>
> ```
> * Cambiar la dirección de un repositorio remoto:
> ```
> git remote set-url origin <URL_DEL_REPOSITORIO_REMOTO>
> ```
> * Ver la dirección de un repositorio remoto:
> ```
> git remote get-url origin
> ```
> * Listar los nombres y direcciones de todos los repositorios remotos:
> ```
> git remote -v 
> ```
>

10. **Pregunta de Comandos:**

Proporciona los comandos para añadir todos los cambios en los archivos al staging area y luego realizar un commit con el mensaje "Initial commit".

```
git add .
git commit -m "Initial commit"
```

## Sección 4: MySQL

1. **Pregunta de Código:**
- Escribe una consulta SQL para crear una base de datos llamada company y una tabla llamada employees con las siguientes columnas: id (INT, auto-increment, primary key), name (VARCHAR(100)), position (VARCHAR(50)), salary (DECIMAL(10, 2)), y hire_date (DATE).

```sql
CREATE DATABASE company;

USE company;

CREATE TABLE employees (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  position VARCHAR(50),
  salary DECIMAL(10, 2),
  hire_date DATE
);
```

2. **Pregunta Teórica:**

Explica la diferencia entre una clave primaria (Primary Key) y una clave foránea (Foreign Key) en MySQL. ¿Cuándo y por qué se utilizan?

> Una clave primaria es una columna o conjunto de columnas que identifica de manera única cada fila de una tabla. 
> Solo puede haber una clave primaria por tabla. La clave primaria se utiliza para identificar y acceder a registros específicos dentro de una tabla. 
> También puede usarse para garantizar la integridad referencial en las relaciones entre tablas. 
> 
> Una clave foránea es una columna o conjunto de columnas en una tabla que establece una relación con la clave primaria de otra tabla. 
> La clave foránea se utiliza para vincular los registros de una tabla secundaria con los registros de una tabla primaria.

3. **Pregunta de Código:**

Escribe una consulta SQL para insertar tres registros en la tabla employees creada en la pregunta 2.

```sql
INSERT INTO employees (name, position, salary, hire_date)
VALUES  ('John Doe', 'Manager', 5000.00, '2022-01-01'),
        ('Jane Smith', 'Developer', 4000.00, '2022-02-15')
        ('Mike Johnson', 'Salesperson', 3000.00, '2022-03-30');
```

4. **Pregunta de Código:**

Muestra cómo actualizar el salario de un empleado específico en la tabla employees. 
Por ejemplo, actualiza el salario del empleado con id = 1 a 60000.00.

```sql
UPDATE employees SET salary = 60000.00 WHERE id = 1;
```

5. **Pregunta de Código:**

Escribe una consulta SQL para seleccionar todos los empleados cuyo salario sea mayor a 50000.00 y ordenarlos por el campo C en orden descendente.

```sql
SELECT * FROM employees WHERE salary > 50000.00 ORDER BY 50000.00 DESC;
```

6. **Pregunta Teórica:**

¿Qué es una transacción en MySQL y cómo se utiliza? Proporciona un ejemplo de uso.

> Una transacción es una secuencia de operaciones realizadas como una sola unidad de trabajo. 
> En otras palabras, una transacción es un grupo de comandos que se ejecutan como un solo comando. 
> Si todas las operaciones dentro de la transacción se ejecutan exitosamente, la transacción se considera exitosa y todos los cambios de datos se guardan permanentemente en la base de datos. 
> Sin embargo, si cualquiera de las operaciones falla, todos los cambios de datos realizados durante la transacción se revierten y la base de datos permanece en el mismo estado que tenía antes de que comenzara la transacción.
> 
> Un ejemplo de la necesidad de las transacciones puede ser en un sistema bancario en línea. Cuando un cliente transfiere dinero de una cuenta a otra, se realizan dos operaciones: 
> la primera es debitar la cuenta del remitente y la segunda es acreditar la misma cantidad en la cuenta del destinatario. 
> Estas dos operaciones forman una sola transacción. Si ambas operaciones tienen éxito, la transacción se considera exitosa y se transfiere el dinero. 
> Sin embargo, si alguna de las operaciones falla, la transacción se revierte y el dinero no se transfiere.

7. **Pregunta de Código:**

Crea una vista en MySQL llamada high_earning_employees que seleccione todas las columnas de los empleados cuyo salario sea mayor a 70000.00.

```sql
CREATE VIEW 
    high_earning_employees 
AS
    SELECT * 
    FROM employees 
    WHERE salary > 70000.00; 
```