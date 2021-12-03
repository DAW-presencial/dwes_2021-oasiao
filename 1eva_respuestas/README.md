## PARTE 2: PRUEBA PRÁCTICA <br />
4. Sea una subclase que no tiene definidas las funciones 'mágicas' __get() y __set() pero la clase padre sí. 
   Sea $obj una instancia de esa subclase.<br />

   a) Si leo o escribo una propiedad invisible para $obj, ¿se activan las funciones mágicas de la clase padre?<br />
         Sí. Como hemos podido comprobar, en la carpeta ___1eva/clases___, nos detecta las funciones mágicas de la clase padre,
         clases que se encuentran en la carpeta ___/Class___

   b) ¿cómo afecta a la subclase que una propiedad sea privada o protegida en la clase padre?<br /> 
         Si la propiedad es privada, la subclase no podrá heredarla. En cambio, si es protegida sí que puede heredarlo y utilizarla.


5. Crea un formulario que incluya lo siguiente:<br />
   a) dos inputs para nombre y apellidos.<br />
   b) un input de tipo fecha para la fecha de nacimiento.<br />
   c) dos controles para la subida de ficheros.<br />
   d) un botón para enviar el formulario y que uan vez enviado, informe del resultado de cada uno de los datos enviados,<br />
   (nombre, apellidos, fecha de nacimiento y el nombre de los dos ficheros, incluido el tamaño de cada uno de ellos en bytes)<br />
   
Hemos creado los cinco inputs más el botón dentro de una función llamada displayForm(). Una vez que enviamos, nos muestra
el nombre, los apellidos, la fecha de nacimiento en formato (YYYY/MM/DD), los dos files y un botón para volver al formulario.<br />


Ejercicio 6: Desplegar la aplicación en el servidor.<br />
He desplegado mi examen en el remoto: oasiao.ifc33b.cifpfbmoll.eu