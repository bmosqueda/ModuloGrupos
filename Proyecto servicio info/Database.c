Users
{
	+ id: int
	+ accountNumber: string
	+ names: string
	+ lastName: string
	+ secondLastName: string
	+ email: string
	+ idCampus: int 
}

RolUsers
{
	+ id: int 
	+ idUser: int 
	+ idRol: int 
}

//Roles{master, administrador, coordinador, profesor}
Rol
{
	+ id: int 
	+ type: string
}

//Incluye facultades y bachilleratos
Campus
{
	+ id: int 
	+ name: string
}

CarrerArea //Para los bachilleratos se manejará como área
{
	+ id: int
	+ plan: string	//Es como una mátricula única
	+ name: strig
	+ idCampus: int
}

Student //El alumno es un usuario o qué es el autoregristro
{
	+ int: id
	+ accountNumber: int 
	+ lastName: string
	+ secondLastName: string
	+ email: string
	+ name: string
	+ idTypeStudent: int 
}

/*//{normal, invitado, irregular, intercambio }
Tipo de alumno
{
	+ id: int 
	+ string: tipo
}
Profesor
{
	+ id: int 
	+ usuario: int 
	+ idMateria: int
}*/

Course//Como los profesores pueden tener muchos grupos y los grupos muchos profesores se crea esta tabla intermediaria
{
	+ id: int 
	+ idGroup: int 
	//+ idUsuario: int //Profesor
	+ name: string
}

CoursesTeachers
{
	+ id: int 
	+ idUser: int 
	+ idCourse: int 
}

Groups
{
	+ int: id
	+ grade: int
	+ group: char
	+ generation: string	//o fecha de inicio de la generación
	+ periods: int	
	+ idCarrerArea: int
	+ isOficial: bool 	//Porque se podrá dar de alta grupos no oficiales
}

StudentsGroups
{
	+ id: int 
	+ idStudent: int 
	+ idGroup: int 
}

Lows
{
	+ int: id
	+ idUser: int
	+ studentsName: int
	+ date: Date
}