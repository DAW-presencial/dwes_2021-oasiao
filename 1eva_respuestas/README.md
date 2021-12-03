**PARTE 2: PRUEBA PRÁCTICA
4. Sea una subclase que no tiene definidas las funciones 'mágicas' __get() y __set() pero la clase padre sí. 
   Sea $obj una instancia de esa subclase.
   a) Si leo o escribo una propiedad invisible para $obj, ¿se activan las funciones mágicas de la clase padre?
   
   b) ¿cómo afecta a la subclase que una propiedad sea privada o protegida en la clase padre? 


**5. Crea un formulario que incluya lo siguiente:
   a) dos inputs para nombre y apellidos.
   b) un input de tipo fecha para la fecha de nacimiento.
   c) dos controles para la subida de ficheros.
   d) un botón para enviar el formulario y que uan vez enviado, informe del resultado de cada uno de los datos enviados,
   (nombre, apellidos, fecha de nacimiento y el nombre de los dos ficheros, incluido el tamaño de cada uno de ellos en bytes)**
   
Hemos creado los cinco inputs más el botón dentro de una función llamada displayForm(). Una vez que enviamos, nos muestra
el nombre, los apellidos, la fecha de nacimiento en formato (YYYY/MM/DD), los dos files y un botón para volver al formulario. 