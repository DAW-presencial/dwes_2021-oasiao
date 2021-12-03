__PARTE 2: PRUEBA PRÁCTICA__ <br />
__4. Sea una subclase que no tiene definidas las funciones 'mágicas' __get() y __set() pero la clase padre sí. 
   Sea $obj una instancia de esa subclase.__

   __a) Si leo o escribo una propiedad invisible para $obj, ¿se activan las funciones mágicas de la clase padre?__
         Sí. Como hemos podido comprobar, en la carpeta ___1eva/clases___, nos detecta las funciones mágicas de la clase padre,
         clases que se encuentran en la carpeta ___/Class___

   __b) ¿cómo afecta a la subclase que una propiedad sea privada o protegida en la clase padre?__ 
         Si la propiedad es privada, la subclase no podrá heredarla. En cambio, si es protegida sí que puede heredarlo y utilizarla.


__5. Crea un formulario que incluya lo siguiente:
   a) dos inputs para nombre y apellidos.
   b) un input de tipo fecha para la fecha de nacimiento.
   c) dos controles para la subida de ficheros.
   d) un botón para enviar el formulario y que uan vez enviado, informe del resultado de cada uno de los datos enviados,
   (nombre, apellidos, fecha de nacimiento y el nombre de los dos ficheros, incluido el tamaño de cada uno de ellos en bytes)__
   
Hemos creado los cinco inputs más el botón dentro de una función llamada displayForm(). Una vez que enviamos, nos muestra
el nombre, los apellidos, la fecha de nacimiento en formato (YYYY/MM/DD), los dos files y un botón para volver al formulario.


__ Ejercicio 6: Desplegar la aplicación en el servidor. __
He desplegado mi examen en el remoto: oasiao.ifc33b.cifpfbmoll.eu