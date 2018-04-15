***********Si un alumno es dado de alta en algún grupo a través de algún sistema asociado, el resto de inmediatamente reflejado en su portafolio las evaluaciones disponibles para ese grupo en
EvPraxis).****************

los sistemas asociados estarán informados y podrán proceder a su incorporación
automática. (Ejemplo, si se agrega un alumno a un grupo desde EDUC, este alumno vea
//Variables de sesión de php
un módulo que permita registrar, administrar y dar seguimiento a
los alumnos y grupos escolares pertenecientes a planteles educativos universitarios.

// El módulo debe permitir:
 Contar con información actualizada de los alumnos que asisten a los grupos regulares.
 Que los coordinadores y/o profesores puedan reportar aquellos alumnos que dejaron de
asistir a los grupos.
 Que los coordinadores y/o profesores puedan agregar a los alumnos que se integran a los
grupos de manera extemporánea.
 Los sistemas asociados puedan actuar en consecuencia con los cambios en los integrantes
de los grupos.
 Si un alumno es dado de alta en algún grupo a 	través de algún sistema asociado, el resto de
los sistemas asociados estarán informados y podrán proceder a su incorporación
automática.


// Considerar:
 Contar con un rol administrador que puede dar de alta coordinadores de carrera.
 Considerar los grupos oficiales (obtenidos desde la planta docente).
 Los grupos pueden ser creados por el administrador/coordinador/profesor.
 El Coordinador solo puede agregar alumnos a los grupos asociados a su plantel/carrera.
 El profesor solo puede agregar alumnos a los grupos asociados a su cuenta en planta
docente.
 Si se requieren grupos adicionales, deberán crearse como grupos no oficiales.
 Debe considerar alumnos irregulares y/o de intercambio.
 Los sistemas asociados se podrán conectar a través de una tabla federada y/o una api json.
*** Debe permitir “autoregistro”.
*** Para el “autoregistro” en grupos oficiales, deberá contarse con la aprobación de un
coordinador o profesor del grupo.
 Para el “autoregistro” en grupos no oficiales no se requerirá aprobación.
 En cualquiera de los grupos, el administrador/coordinador/profesor podrá dar de baja
(lógica) a un alumno (Registrar en un log estos cambios individuales de alta y baja).
 Los datos de los alumnos deben estar en tabla separada de los datos de los
grupos/periodos. (Se debe considerar la agrupación por generación, pues usualmente un
grupo se mantiene constante desde que ingresa a un plantel hasta que sale, salvo contadas
excepciones donde se llegan a combinar alumnos de más de un grupo en uno solo).
 Los datos que se deben tener por alumno son: Id_alumno, correo, no. cuenta y nombre.
 Los datos que se deben tener por profesor son: Profesor, materia, grado y plantel.
 Los alumnos y grupos deben consultarse por plantel.