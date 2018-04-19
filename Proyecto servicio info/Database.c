Users
{
	+ id: int
	+ accountNumber: string
	+ name: string
	+ lastName: string
	+ secondLastName: string
	+ email: string
	+ idCampus: int 
}

RolsUsers
{
	+ id: int 
	+ idUser: int 
	+ idRol: int 
}

//Roles{master, administrador, coordinador, profesor}
Rols
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

CarrersAreas //Para los bachilleratos se manejará como área
{
	+ id: int
	+ idCampus: int
	+ plan: string	//Es como una mátricula única
	+ name: strig
}

Students //El alumno es un usuario o qué es el autoregristro
{
	+ int: id
	+ accountNumber: int 
	+ name: string
	+ lastName: string
	+ secondLastName: string
	+ email: string
	+ typeStudent: int 
}

UnofficialGroups
{
	id: int
	idUser: int 
	idGroup: int 
}
/*
//{normal, invitado, irregular, intercambio }
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

Courses//Como los profesores pueden tener muchos grupos y los grupos muchos profesores se crea esta tabla intermediaria
{
	+ id: int 
	+ name: string
	+ idGroup: int 
	//+ idUsuario: int //Profesor
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