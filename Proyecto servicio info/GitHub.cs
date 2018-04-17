//Para subir nuevos proyectos a GitHub
git init: 		//inicia git al interno de la carpeta
git add . 		//añade el documento (o carpeta) en el area de espera ("stage")
git commit -m "mi primer mensaje de cambios": 		//describe los cambios realizados
git remote add origin https:/github.com/bmosqueda/MySqli:		//github.com/susannalles/MinimalEditions.git: apunta a la dirección donde deseáis subir el nuevo material
git push -u origin master": 		//subís los cambios al repositorio remote en GitHub por primera vez

//*****************Subir cambios
git add .  // añade el documento (o carpeta) en el area de espera ("stage")
git commit -m "mensaje con los detalles del cambio" // describe los cambios realizados
git push origin master// subís los cambios a GitHub *git push origin [branch]: subís los cambios al repositorio remote en GitHub. Asegurar de escribir el nombre del branch que quieres subir sus cambios y nunca subes al master sin que todos revisamos sus cambios.

//Bajar los cambios e insertarlos
git pull

//Deshacer todos tus cambios locales
git checkout .

//bajar los cambios de una rama específica
git pull origin <nombre de la rama>

//subir los cambios de una rama
git push origin <nombre de la rama>

//cambiar de una rama a otra
git checkout nombreDeLaRama

//Establecer cuenta 
git config --global user.email sam@google.com

//Para establecer un nuevo repositorio
git init

//Clonar un repositorio existente
git clone https://github.com/bmosqueda/MySqli

//Muestra la lista de los archivos que se han cambiado junto con los archivos que están por ser añadidos o comprometidos
git status

//Para listar todas las ramas
git branch

//Para crear una rama nueva
git branch <nombre de la rama>

//Para borrar una rama
git branch -d <branch name>

//Para ver las diferencias de las ramas antes de ser fusionadas
git diff <source-branch> <target-branch>

//Muestra una lista de todos los commits con sus detalles
git log

//Eliminar archivos del directorio actual
git rm filename.txt

