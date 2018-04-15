Usuario
{
	id: int
	número de cuenta: int
	nombre(s): string
	apellido paterno: string
	apellido materno: string
	correo: string
	idPlantel: int 

	idCarrera: int 
}

RolUsuarios
{
	id: int 
	idUsuario: int 
	idRol: int 
}

//Roles{master, administrador, coordinador, profesor}
Rol
{
	id: int 
	tipo: string
}

//Incluye facultades y bachilleratos
Plantel
{
	id: int 
	nombre: string
}

Carrera o Área //Para los bachilleratos se manejará como área
{
	id: int
	plan: string	//Es como una mátricula única
	nombre: string
	idPlantel: int
}

Alumno //El alumno es un usuario o qué es el autoregristro
{
	int: id
	número de cuenta: int 
	correo: string
	nombre(s): string
	apellido paterno: string
	apellido materno: string
	idTipoAlumno: int 
}

//{normal, invitado, irregular, intercambio }
Tipo de alumno
{
	id: int 
	string: tipo
}

Profesor
{
	id: int 
	usuario: int 
	idMateria: int
}

Materia//Como los profesores pueden tener muchos grupos y los grupos muchos profesores se crea esta tabla intermediaria
{
	id: int 
	idGrupo: int 
	idUsuario: int //Profesor
	string: nombre
}

MateriasProfesor
{
	id: int 
	idProfesor: int 
	idMateria: int 
}

Grupo
{
	int: id
	grado: int
	grupo: char
	generación: Date	//o fecha de inicio de la generación
	periodos: int	
	idCarrera: int
	esOficial: bool 	//Porque se podrá dar de alta grupos no oficiales
}

GruposAlumno
{
	id: int 
	idAlumno: int 
	idGrupo: int 
}

Log de bajas //Cómo se gestiona esto, en una tabla o en arvhivos de texto
{
	int: id
	usuario: int
	alumno: int
	fecha de baja: Date
}
